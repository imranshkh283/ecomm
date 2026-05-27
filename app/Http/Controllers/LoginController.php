<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('website.login');
    }
}
