<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenerateTokenUserRequest;
use App\Http\Requests\ResetPasswordUserRequest;
use App\Models\Option;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPawssordController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("guest");
    }
    public function reset(){
        return view('auth.reset'); 
    }

    public function generateToken(GenerateTokenUserRequest $request)
    {
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'code_employeur';
        $user = User::where($fieldType,$request->email)->first();
        if(!is_null($user)){
            $token = Str::random(60);
            DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            $user->notify(new ResetPasswordNotification(route('employeur.new.password') . '?token='.$token,"Réinitialiser votre mot de passe"));
            return back()->with('success','Un email de réinitialisation de mot de passe a été envoyé à votre adresse email');
        }else{
            return back()->with('error','identifiant n\'existe pas')->withInput($request->input());
        }
    }

    public function newPassword(){
        if(request()->filled('token')){
            $token = DB::table('password_resets')->where('token',request()->token)->first();
            if(is_null($token)) abort(404);
            $max = Option::where([
                ['name','reset_password_duration'],
                ['instance','User']
            ])->pluck('value')->first();
            if(!now()->gte(Carbon::parse($token->created_at)->addMinutes($max ?? 15))){
                return view('auth.new-password');
            }else{
                return redirect(route('employeur.reset'))->with('error','Token expiré');
            }
        }else{
            return redirect(route('employeur.reset'));
        }
    }

    public function StoreNewPassword(ResetPasswordUserRequest $request){
        
        $resultat = DB::transaction(function() use($request){
            $user = DB::table('password_resets')
            ->where('token',$request->token)
            ->first();
            DB::table('password_resets')->where('email',$request->email)->delete();
            $user = User::where('email',$user->email)
            ->update([
                'password' => Hash::make($request->password)
            ]);
            return $user;
        });
        if($resultat){
            return redirect(route('login'))->withSuccess('Votre mot de passe a été mis à jour avec succès');
        }else{
            return redirect(route('employeur.reset'))->withError('Une erreur est survenue');
        }
    }
}
