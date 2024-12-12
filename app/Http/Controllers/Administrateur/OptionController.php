<?php

namespace App\Http\Controllers\Administrateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class OptionController extends Controller
{
    //
    public function Index()
    {
        $options = Option::all();
        return view('administrateur.options.index', compact(['options']));
    }

    public function Guide()
    {
        return view('administrateur.options.guide');
    }
}
