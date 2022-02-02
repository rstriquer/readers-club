<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

/**
 * Receives an ISBN, if the user already has a book related to that ISBN presents the edition form, otherwise presents the inclusion form.
 */
class BookGetUserAreaController extends UserAreaController
{
    public function __invoke(string $isbn) : View
    {
        parent::__invoke($isbn);
        try {
            $userBook = $this->service->getUserBook($isbn);
            if ( ! $userBook ) {
                $book = $this->service->getBook($isbn);
                $userBook = app(UserBook::class);
                $userBook->book()->associate($book);
            }
            return view('user-area.book-get', [
                'userBook' => $userBook,
                'form' => [ 'url' => route('user-area.post.isbn', ['isbn' => $isbn]) ],
            ]);
        } catch (Exception $err) {
            Log::error($err);
            throw $err;
        }
    }
}
