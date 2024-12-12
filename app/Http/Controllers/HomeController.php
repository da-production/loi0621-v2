<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\EmployeurService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function EmployeurCode(Request $request)
    {
        return EmployeurService::EmployeurCode($request);
    }

    public function EmployeurCode2(Request $request)
    {
        $response = Http::post("https://teledeclaration.cnas.dz/srv/cnas/cotisant/cnac/$request->code?usr=cnac&pwd=FD@85_GKwsD01")->json();
        if(is_null($response['cotisant']['statut'])){
            return response()->json([],404);
        }
        return response()->json(['companyNameLt'=>$response['cotisant']['companyNameLt'],'installationDate'=>$response['cotisant']['installationDate']]);
    }
}
