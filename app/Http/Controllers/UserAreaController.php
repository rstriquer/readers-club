<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class UserAreaController extends Controller
{
    use AuthorizesRequests;

    private BookService $service;
    public function __invoke(string $isbn)
    {
        $this->service = app(BookService::class);
        $this->authorize('user.identified');
    }
}
