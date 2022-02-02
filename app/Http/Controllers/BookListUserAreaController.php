<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class BookListUserAreaController extends Controller
{
    use AuthorizesRequests;

    public function __invoke() : View
    {
        $this->authorize('user.identified');
        return view('user-area.book-list', [
            'userBooks' => app(BookService::class)->getUserBooks(),
            'form' => []
        ]);
    }
}