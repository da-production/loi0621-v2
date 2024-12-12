<?php

namespace App\Http\Controllers\Administrateur;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SendResetToEmailRequest;
use App\Http\Requests\UpdateProfileAdministrateurRequest;
use App\Models\Administrateur;
use App\Models\Employeur;
use App\Models\File;
use App\Models\Formation;
use App\Http\Requests\UtilisateurStoreRequest;
use App\Models\Message;
use App\Models\Subvention;
use App\Models\User;
use App\Models\Wilaya;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdministrateurController extends Controller
{
    public function profile()
    {
        $auth = auth()->user();
        $where = [];
        if($auth->role_id != 1){
            array_push($where, ['cod_wilaya',$auth->cod_wilaya]);
        }

        // Subventions
        $subDecision = Employeur::where($where)->withCount(['subventions' => function($query){
            $query->whereNotNull('decision_dos');
        }])->pluck('subventions_count')->sum();
        $sub = Employeur::where($where)->withCount(['subventions'])->pluck('subventions_count')->sum();

        // Formations
        $formDecision = Employeur::where($where)->withCount(['formations' => function($query){
            $query->whereNotNull('decision_dos');
        }])->pluck('formations_count')->sum();
        $form = Employeur::where($where)->withCount(['formations'])->pluck('formations_count')->sum();

        
        // Employeurs
        $employeurs = Employeur::where($where)->count();
        
        
        $data = ['employeurs','subDecision','sub','formDecision','form','employeurs'];
        
        return view('administrateur.utilisateurs.profile',compact($data));
    }

    public function create()
    {
        $wilayas = Wilaya::all();
        return view('administrateur.utilisateurs.create', compact(['wilayas']));
    }

    public function messageShow()
    {
        return view('administrateur.newmessage');
    }

    public function messageStore(Request $request)
    {
        
        $msg = new Message();
        $msg->cod_msg = 'cod_msg-01';
        $msg->des_fr = 'Text 01';
        $msg->content_fr = $request->message;
        $msg->save();
        return back();
    }

    public function Statistique()
    {
        abort_unless(mypolicy('statistique','view-any'),403);
        return view('administrateur.statistique');
    }

    public function StatistiqueAPI()
    {        
        $employeurs     = Employeur::get('code_employeur');
        $subventions    = Subvention::get('code_employeur');
        $formations     = Formation::get('code_employeur');
        $data = [];
        $data['totalDemande']       = 0;
        $w = [];
        $wilayas = Wilaya::get(['des_fr','cod_wilaya']);
        
        $users = DB::select(
            DB::raw(
                "
                SELECT count(*) as total , cod_wilaya from users 
                where code_employeur in (select code_employeur from employeurs)
                group by cod_wilaya
                "
            )
        );

        $usersInactif = DB::select(
            DB::raw(
                "
                SELECT count(*) as total , cod_wilaya from users 
                where code_employeur not in (select code_employeur from employeurs)
                group by cod_wilaya
                "
            )
        );
        foreach($wilayas as $wilaya)
        {
            array_push($w,$wilaya->cod_wilaya . " - " . $wilaya->des_fr);
            $data['useractif'][$wilaya->cod_wilaya] = 0;
            $data['usersInactif'][$wilaya->cod_wilaya] = 0;
            $data['subventions'][$wilaya->cod_wilaya] = 0;
            $data['formations'][$wilaya->cod_wilaya] = 0;
            $data['employeurs'][$wilaya->cod_wilaya] = 0;
            foreach($users as $user)
            {
                if($wilaya->cod_wilaya == $user->cod_wilaya){
                    $data['useractif'][$wilaya->cod_wilaya]  = $user->total;
                }
            }

            foreach($usersInactif as $user)
            {
                if($wilaya->cod_wilaya == $user->cod_wilaya){
                    $data['usersInactif'][$wilaya->cod_wilaya]  = $user->total;
                }
            }

            foreach($subventions as $subvention)
            {
                if($wilaya->cod_wilaya == substr($subvention->code_employeur, 0, 2)){
                    $data['subventions'][$wilaya->cod_wilaya]  = $data['subventions'][$wilaya->cod_wilaya] + 1;
                    $data['totalDemande'] = $data['totalDemande'] + 1;
                }
            }
            foreach($formations as $formation)
            {
                if($wilaya->cod_wilaya == substr($formation->code_employeur, 0, 2)){
                    $data['formations'][$wilaya->cod_wilaya]  = $data['formations'][$wilaya->cod_wilaya]+1;
                    $data['totalDemande'] = $data['totalDemande'] + 1;
                }
            }
            foreach($employeurs as $employeur)
            {
                if($wilaya->cod_wilaya == substr($employeur->code_employeur, 0, 2)){
                    $data['employeurs'][$wilaya->cod_wilaya]  = $data['employeurs'][$wilaya->cod_wilaya]+1;
                }
            }
        }
        $data['useractif'] = array_values($data['useractif']);
        $data['usersInactif'] = array_values($data['usersInactif']);
        $data['subventions'] = array_values($data['subventions']);
        $data['formations'] = array_values($data['formations']);
        $data['employeurs'] = array_values($data['employeurs']);
        return response()->json(['wilayas'=>$w,'data'=>$data],200);
    }

    public function update(UpdateProfileAdministrateurRequest $request)
    {
        $data = [...$request->validated()];
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }else{
            unset($data['password']);
        }
        Administrateur::where('username',auth()->guard('admin')->user()->username)->update($data);
        return back()->with('success', "profil a été mis à jour avec succès");
    }

    public function telechargement($fileID)
    {
        $file = File::where('id',$fileID)->firstOrFail();
        return Storage::download($file->url);
    }

    public function ResetWithEmailForm()
    {
        return view('administrateur.utilisateurs.email');
    }

    public function ResetPasswordForm()
    {
        return view('administrateur.utilisateurs.reset');
    }

    public function ResetPassword(ResetPasswordRequest $req)
    {
        $user = DB::table('password_resets')
        ->where('token',$req->token)
        ->first();
        if(is_null($user)) return redirect(route('administrateur.password.email'))->withError("le jeton n'a pas été trouvé");
        Administrateur::where(
            'email', $user->email
        )->update([
            'password'          => Hash::make($req->password)
        ]);
        DB::table('password_resets')
        ->where('token',$req->token)
        ->delete();
        return redirect(route('administrateur.connexion'))->withSuccess("le mot de passe a été mis à jour avec succès");
    }
    public function SendResetToEmail(SendResetToEmailRequest $req)
    {
        $user = Administrateur::where('email',$req->email)->first();
        $token = Str::random(60);
        DB::table('password_resets')
        ->insert([
            'email'     => $req->email,
            'token'     => $token
        ]);
        $user->notify(new ResetPasswordNotification(route('administrateur.password.reset.form') . '?token='.$token));
        return back()->withSuccess("un lien de réinitialisation du mot de passe a été envoyé à votre adresse e-mail");
    }

}
