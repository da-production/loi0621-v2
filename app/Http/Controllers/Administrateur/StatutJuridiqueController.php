<?php

namespace App\Http\Controllers\Administrateur;

use App\Models\StatuJuridique;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatutJuridiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $status = StatuJuridique::all();
        return view('administrateur.statu', compact(['status']));
    }
}
