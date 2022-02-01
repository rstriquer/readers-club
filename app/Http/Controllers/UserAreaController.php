<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use App\Services\BookService;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

abstract class UserAreaController extends Controller
{
    private BookService $service;
    abstract public function __invoke(string $isbn) : View;
}
