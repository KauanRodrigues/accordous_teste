<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        if(empty(session()->get('FUNCIONARIO')))
            return redirect()->route('login');

        return view('home');
    }
}