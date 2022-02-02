<?php

namespace App\Services;

use App\Models\UserBook;

class BookService
{
    public function __construct(private UserBook $userBook)
    {
    }
}
