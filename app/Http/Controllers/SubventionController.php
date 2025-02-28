<?php

namespace App\Http\Controllers;

use App\Models\Branche;
use App\Models\Employeur;
use App\Models\Subvention;
use App\Models\File;
use App\Models\StatuJuridique;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubventionController extends Controller
{
    /**
     * @Description
     * check if "employeur" has one or many "Subvention" or NULL
     * @return View
     */
    public function demandeList()
    {

        if (count(auth()->user()->employeur->subventions) == 0) return redirect()->route('employeur.profile')->with('error', 'vous n\'avez aucune demande veuillez en créer une');

        $subventions = auth()->user()->employeur->subventions;

        if (count($subventions) == 1) return redirect()->route('subvention.demande.detail', ['num_dossier' => $subventions[0]->cod_demande]);

        if (count($subventions) > 1) return view('employeur.subvention.demandes', \compact(['subventions']));

        return redirect()->route('subvention.demande.create')->with('error', 'vous n\'avez aucune demande veuillez en créer une');
    }

    public function demande($num_dossier)
    {
        $demande = Subvention::where('cod_demande', $num_dossier)->first();
        return view('employeur.subvention.demande', \compact(['demande']));
    }

    
    
    public function create()
    {
        // if (is_null(auth()->user()->employeur->subvention)) 
        return view('employeur.subvention.demande-create');
        return back()->with('error', "vous n'êtes pas autorisé à accéder à cette page en utilisant l'URL");
    }

    /**
     * Display inscription form if employeur doesn't exit else redirect to profile 
     */
    public function inscription()
    {
        $subvention = Subvention::where([
            ['code_employeur', auth()->user()->code_employeur],
        ])->first();
        if (!$subvention == null) return redirect()->route('employeur.profile');

        $branches = Branche::select('cod_branche', 'des_fr', 'des_ar')
            ->orderBy('des_fr', 'asc')
            ->get();
        $status = StatuJuridique::select('cod_stat', 'des_fr', 'des_ar')
            ->orderBy('des_fr', 'desc')
            ->get();
        //all();

        $wilaya = Wilaya::where('cod_wilaya', '=', auth()->user()->cod_wilaya)->first();
        return view('employeur.subvention.inscription', \compact(['branches', 'status', 'wilaya']));
    }



    /**
     * Only for display upload forms
     * @return BladeView
     */
    public function files()
    {
        return view('employeur.subvention.upload-file');
    }

    /**
     * StoreMethod to create new employeur and new subvention
     * @return BladeView | Boolean False
     */
    private function storeMethod($request, $code_employeur)
    {

        if (is_array($request->RC)) {
            $rc = implode("", $request->RC);
        } else {
            $rc = $request->RC;
        }

        // $numbers = "0123456789";
        // $numbers = substr(str_repeat(str_shuffle($numbers),50),1,8);
        $numbers = \substr(auth()->user()->code_employeur, 0, 8);
        // dd(strlen($numbers),$numbers);

        $employeur                          = new Employeur();
        $employeur->id                      = Str::uuid();
        $employeur->numero                  = auth()->user()->cod_wilaya . $numbers;
        $employeur->cod_stat                = $request->cod_stat;
        $employeur->cod_branche             = $request->cod_branche;
        $employeur->date_debut_activite     = $request->date_debut_activite;
        $employeur->cod_wilaya              = auth()->user()->cod_wilaya;
        $employeur->adresse                 = $request->adresse;
        $employeur->adresseAr               = $request->adresseAr;
        $employeur->raison_social           = $request->raison_social;
        $employeur->raison_social_Ar        = $request->raison_social_Ar;
        $employeur->sigle                   = $request->sigle;
        $employeur->code_employeur          = $code_employeur;
        $employeur->representant            = $request->representant;
        $employeur->representantAr          = $request->representantAr;
        $employeur->qualite                 = $request->qualite;
        $employeur->qualiteAr               = $request->qualiteAr;
        $employeur->tel                     = $request->tel;
        $employeur->mob                     = $request->mob;
        $employeur->email_entreprise        = $request->email_entreprise;
        $employeur->RIB                     = $request->RIB;
        $employeur->NIF                     = $request->NIF;
        $employeur->NIS                     = $request->NIS;
        $employeur->RC                      = $rc;
        $employeur->nbr_travailleurs        = $request->nbr_travailleurs;
        $employeur->condition_accepte       = $request->condition_accepte;

        // $subventions = [
        //     'id'                => Str::uuid(),
        //     'cod_demande'       => Date("Ymdhis"),
        //     'nbr_travailleurs'  => $request->nbr_travailleurs,
        //     'intervenant'       => auth()->user()->cod_wilaya,
        //     'code_employeur'    => auth()->user()->code_employeur,
        // ];

        $employeur->save();
    }

    /**
     * Sotre Validate form input and call StoreMethod if validator is true
     * @return back [success || error]
     */
    public function store(Request $request)
    {

        $data = [
            "raison_social" => $request->raison_social,
            "raison_social_Ar" => $request->raison_social_Ar,
            "code_employeur" => $request->code_employeur,
            "sigle" => $request->sigle,
            "cod_branche" => $request->cod_branche,
            "cod_stat" => $request->cod_stat,
            "NIF" => str_replace("_", "", $request->NIF),
            "NIS" => str_replace("_", "", $request->NIS),
            "RIB" => str_replace("_", "", $request->RIB),
            "RC" => $request->RC,
            "adresse" => $request->adresse,
            "cod_wilaya" => $request->cod_wilaya,
            "adresseAr" => $request->adresseAr,
            "email_entreprise" => $request->email_entreprise,
            "tel" => $request->tel,
            "mob" => $request->mob,
            "representant" => $request->representant,
            "qualite" => $request->qualite,
            "nbr_travailleurs" => $request->nbr_travailleurs,
            "qualiteAr" => $request->qualiteAr,
            "representantAr" => $request->representantAr,
            "condition_accepte" => $request->condition_accepte,
            "date_debut_activite" => $request->date_debut_activite,
        ];

        $inputs = [
            'cod_branche'   => 'required',
            'cod_stat'   => 'required',
            'raison_social'   => 'required',
            'raison_social_Ar'   => 'required',
            'sigle'   => 'required',
            'code_employeur'   => 'required',
            'adresse'   => 'required',
            'cod_wilaya'   => 'required',
            'adresseAr'   => 'required',
            'tel'   => 'required',
            'mob'   => 'required',
            'email_entreprise'   => 'required|email',
            'RIB'   => 'required|min:20|max:20',
            'NIF'   => 'required|numeric',
            'NIS'   => 'required|numeric',
            // |regex:/[0-9]{2}([AB]|[AB0-9])/
            'representant'   => 'required',
            'representantAr'   => 'required',
            'qualite'   => 'required',
            'qualiteAr'   => 'required',
            'nbr_travailleurs'   => 'required|numeric',
            'condition_accepte'      => "accepted",
            'date_debut_activite'   => 'required'
        ];
        // dd($request->RC, count($request->RC));

        if (is_array($request->RC) && count($request->RC) == 1) {
            $inputs['RC'] = 'required';
        } else {
            $inputs['RC'] = 'required|array|size:7';
        }

        $messages = [
            'cod_branche.required' =>  "'La selection d'une Branche est obligatoire'",
            'RIB.required'   => 'Le RIB est un champs obligatoire',
            'RIB.min'   => 'Le RIB min 20',
            'RIB.max'   => 'Le RIB max 20',
            'condition_accepte' => 'Condition error'
        ];

        if (Auth::check()) {

            $auth = auth()->user();
            $code_employeur = $auth->code_employeur;

            $employeur = Employeur::where([
                ['code_employeur', $auth->code_employeur]
            ])->first();

            if (!is_null($employeur)) {
                // $this->storeMethod($employeur, $code_employeur, $request->nbr_travailleurs);
                // $this->demandeStore($request);
                return back()->with('error', 'Employeur');
            } else {
                $validator = Validator::make($data, $inputs, $messages);
                if ($validator->fails()) return back()->withErrors($validator)->withInput();

                $this->storeMethod($request, $code_employeur);
                return redirect()->route('employeur.profile');
            }
        }
        //$this->storeMethod($request,$code_employeur,'sub');
        /**
         * TODO:
         * redirect to register form
         */
        return back()->with('error', 'please check your data');
    }
}
