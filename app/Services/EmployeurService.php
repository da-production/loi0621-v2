<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EmployeurService{
    public static function EmployeurCode(Request $request)
    {
        // 1- check cotisant in the database if exist
        if ($request->filled('code')) {
            $user = User::where('code_employeur', $request->code)->first();
            if (!is_null($user)) {
                Log::channel('employeur')->warning("[Inscription etape2][".$request->code."] | message: Ce Code Employeur a déjà été pris");
                return response()->json([
                    'code' => 1,
                    'message' => 'Ce Code Employeur a déjà été pris'
                ]);
                
            } else {
                try{
                    $response = Http::post("https://teledeclaration.cnas.dz/srv/cnas/cotisant/cnac/$request->code?usr=cnac&pwd=FD@85_GKwsD01");
                    if (is_null($response['cotisant']['statut'])) {
                        Log::channel('employeur')->warning("[Inscription etape2][".$request->code."] | message: ".$response['message']);
                        return response()->json([
                            'code' => 1,
                            'message' => $response['message']
                        ]);
                    } elseif ($response['cotisant']['statut']['code'] != "1") {
                        Log::channel('employeur')->info("[Inscription etape2][".$request->code."] | message: le cotisant est ". $response['cotisant']['statut']['libelle']);
                        return response()->json([
                            'code' => 1,
                            'message' => "le cotisant est " . $response['cotisant']['statut']['libelle']
                        ]);
                    } else {
                        Log::channel('employeur')->alert("[Inscription etape2][".$request->code."] | message: ".$response['cotisant']['statut']['libelle']);
                        return response()->json([
                            'code' => 0,
                            'message' => $response['cotisant']['statut']['libelle']
                        ]);
                    }
                }catch(\Illuminate\Http\Client\ConnectionException $e){
                    Log::channel('employeur')->error("[".$request->code."]"." Error: " . $e->getMessage());
                }
            }
        }
        // check in api if actif
        return response()->body();
    }
}