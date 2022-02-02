<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookUserAreaRequest;
use App\Services\BookService;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class BookStoreUserAreaController extends Controller
{
    use AuthorizesRequests;

    public function __invoke(StoreBookUserAreaRequest $request, string $isbn, BookService $service) : View
    {
        $this->authorize('user.identified');

        try {
            $userBook = $service->storeUserBook($request, $isbn);
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
