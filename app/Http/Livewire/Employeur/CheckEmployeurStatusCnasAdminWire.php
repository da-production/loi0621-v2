<?php

namespace App\Http\Livewire\Employeur;

use App\Models\ApiCheck;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CheckEmployeurStatusCnasAdminWire extends Component
{
    public bool $status;
    public string $message;
    public string $code_employeur;

    public function mount($code_employeur){
        $this->code_employeur = $code_employeur;
    }

    public function render()
    {
        return view('livewire.employeur.check-employeur-status-cnas-admin-wire');
    }

    public function load(){
        try{
            $this->message = '';
            $response = Http::post("https://teledeclaration.cnas.dz/srv/cnas/cotisant/cnac/".$this->code_employeur."?usr=cnac&pwd=FD@85_GKwsD01");
            if (is_null($response->json()['cotisant'])) {
                $this->status = false;
                $this->message = $response->json()['message'];
                ApiCheck::create([
                    'api_name' => "CNAS_EMPLOYEUR::".$this->code_employeur,
                    'status' => "failed",
                    'status_code' => $response->status(),
                    'response' => json_encode($response->json()),
                ]);
                Log::channel('employeur')->warning("[".$this->code_employeur."]"." status: " . $this->status . " | message: " .$response->json()['message']);
            } else {
                $this->status = true;
                if($response->json()['message'] == '00'){
                    $this->message = "Employeur actif";
                    Log::channel('employeur')->info("[".$this->code_employeur."]"." status: " . $this->status . " | message: Employeur Actif ");
                }else{
                    $this->message = $response->json()['message'];
                    Log::channel('employeur')->warning("[".$this->code_employeur."]"." status: " . $this->status . " | message: " .$response->json()['message']);
                }
                ApiCheck::create([
                    'api_name' => "CNAS_EMPLOYEUR::".$this->code_employeur,
                    'status' => "success",
                    'status_code' => $response->status(),
                    'response' => json_encode($response->json()),
                ]);
            }
        }catch(\Illuminate\Http\Client\ConnectionException $e){
            Log::channel('employeur')->error("[".$this->code_employeur."]"." Error: " . $e->getMessage());
        }
        return;
    }
}
