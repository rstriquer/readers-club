<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Controller;
use Inertia\Inertia;
use Inertia\Response;

class HomeIndexPublicController extends Controller
{
    public function __invoke(Request $request) : Response
    {
        return Inertia::render('HomeIndexPublic', ['auth' => Auth::user()]);
    }
}
