<?php

namespace App\Services;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\UserBook;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookService
{
    public function __construct(private UserBook $userBook)
    {}
    public function getUserBook(string $isbn) : ? UserBook
    {
        return $this->userBook
            ->with('book')
            ->whereUserId(auth()->user()->id)
            ->whereHas('book', function(Builder $query) use ($isbn) {
                $query->whereIsbn($isbn);
            })->get()->first();
    }
    public function getBook(string $isbn) : Book
    {
        try {
            $book = Book::whereIsbn($isbn)
                ->with(['publisher', 'authors'])
                ->firstOrFail();
        } catch(ModelNotFoundException $err) {
            try {
                DB::beginTransaction();
                $partnerData = app(GoogleBookApiInterfaceService::class)
                    ->getCachedData($isbn);

                $book = Book::create([
                    'title' => $partnerData['title'],
                    'thumbnail' => $partnerData['thumbnail'],
                    'pageCount' => $partnerData['pageCount'],
                    'published' => $partnerData['published'],
                    'isbn' => $isbn,
                    'id_api' => $partnerData['id_api'],
                ]);

                foreach($partnerData['authors'] as $author) {
                    try {
                        $author = Author::whereName($author)->firstOrFail();
                    } catch(ModelNotFoundException $err) {
                        $author = Author::create(['name' => $author]);
                    }
                    $book->authors()->save($author);
                }

                try {
                    $publisher = Publisher::whereName($partnerData['publisher'])
                        ->firstOrFail();
                } catch(ModelNotFoundException $err) {
                    $publisher = Publisher::create([
                        'name' => $partnerData['publisher']
                    ]);
                }
                $book->publisher()->associate($publisher);
                $book->save();

                DB::commit();
            } catch(\Exception $err) {
                DB::rollback();
                Log::error($err);
                throw $err;
            }
        }
        return $book;
    }
}
