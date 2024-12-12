<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SteperController extends Controller
{
    //

    public function Index()
    {
        return view('administrateur.options.stepers');
    }
}
