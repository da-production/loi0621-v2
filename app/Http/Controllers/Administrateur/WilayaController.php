<?php

namespace App\Http\Controllers\Administrateur;

use App\Models\Wilaya;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WilayaController extends Controller
{
    public function index()
    {
        $wilayas = Wilaya::all();
        return view('administrateur.wilayas', compact(['wilayas']));
    }
}
