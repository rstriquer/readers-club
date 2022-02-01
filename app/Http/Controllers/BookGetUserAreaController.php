<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class BookGetUserAreaController extends UserAreaController
{
    public function __invoke(string $isbn) : View
    {
        $userBook = UserBook::find($isbn);
        if ( ! $userBook ) {
            $book = Cache::get('user-area.get.isbn.' . $isbn);
            if (true || $book === null) {
                try {
                    $result
                        = app(
                            Client::class,
                            ['config' => ['base_uri' => 'https://www.googleapis.com']]
                        )
                        ->request('GET', '/books/v1/volumes?q=isbn:' . $isbn)
                        ->getBody()
                        ->getContents();
                    $result = data_get(json_decode($result, true), 'items.0');
                    $book = [
                        'title' => data_get($result, 'volumeInfo.title'),
                        'authors' => implode(', ', data_get($result, 'volumeInfo.authors')),
                        'thumbnail' => data_get($result, 'volumeInfo.imageLinks.thumbnail'),
                        'previewLink' => data_get($result, 'volumeInfo.previewLink'),
                        'publisher' => data_get($result, 'volumeInfo.publisher'),
                        'published' => data_get($result, 'volumeInfo.publishedDate'),
                        'pageCount' => data_get($result, 'volumeInfo.pageCount'),
                        'isbn' => $isbn,
                        'id_api' => data_get($result, 'id'),
                    ];
                    Cache::put(
                        'user-area.get.isbn.' . $isbn,
                        $book,
                        now()->addDay()
                    );
                } catch(\Exception $err) {
                    throw $err;
                }
            }
            $userBook = app(UserBook::class);
        }
        return view('user-area.book-get', [
            'book' => $book,
            'userBook' => $userBook,
            'form' => [ 'url' => '/' ],
        ]);
    }
}
