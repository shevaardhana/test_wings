<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function checkout()
    {
        return view('pages.checkout');
    }
}
