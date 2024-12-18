<?php

namespace App\Http\Controllers\Administrateur;

use App\Models\Administrateur;
use App\Models\DoubleAuth;
use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\PasswordReset;
use App\Notifications\CodeAuthNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
        return view('administrateur.utilisateurs.login');
    }

    public function showNewPassword(){
        // Todo: Check Token
        $token = DB::table('password_resets')->where('token',request('token'))->first();
        if(is_null($token)) return redirect()->route('administrateur.connexion')->withError('token non valide');
        return view("administrateur.utilisateurs.new-pwd");
    }

    public function NewPassword(Request $request)
    {
        
        /**
         * Todo
         * 2-validate inputs
         * 3-check account and password
         * 4-check if has expire attribue
         * 5-check the date if expire or not
         * 6-update the password
         */
        // 2- validate inputs
        $data = $request->validate([
            'password'                  => 'required',
            'new_password'              => 'required|min:8|required_with:new_password_confirmation|same:new_password_confirmation',
        ]);

        // 3- check account and password
        $email = DB::table('password_resets')->where('token',request('token'))->first();
        $user = Administrateur::where('email', $email->email)->first();
        if($user){
                $option = Option::where('name','expire_duration')->select('value')->first();
                Administrateur::where('email',$user->email)->update([
                    'password'      => Hash::make(request('new_password')),
                    'expire_at'     => Carbon::now()->addMonths(2),
                    // 'expire_at'     => Carbon::now()->addMonths((int)$option->value),
                ]);
                DB::table('password_resets')->where('email',$user->email)->delete();
                return redirect()->route('administrateur.connexion')->withSuccess("le mot de passe a été réinitialisé avec succès");
            if(Hash::check($data['password'],$user->password))
            {
                //Todo: update password and redirect
                
            }else{
                return back()->withInput()->withError("Mot de passe incorrect");
            }
        }else{
            return back()->withInputs()->with('error', 'Email ou Mot de passe incorrect');
        }
        

    }

    // public function login(Request $request){
    //     $this->validate($request,[
    //         'email'     => 'required',
    //         'password'  => 'required'
    //     ]);

    //     $column = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    //     if(Auth::guard('admin')->attempt(["$column"=> $request->email,'password'=> $request->password], $request->remember))
    //     {
    //         return redirect()->route('administrateur./');
    //         // return redirect()->intended(route('administrateur./'))->with('success','alert success');
    //     }

    //     return redirect()->back()->withInput($request->only('email','remember'))->with('error','alert error');
    // }

    public function login(Request $request){
        /**
         * Stpes:
         * 1-inputs validations
         * 2-if user exist
         * 3-if has password expired make token and redirect
         * 4-if has double auth
         * 5-connect without double auth
         */

         // 1-inputs validation
        $this->validate(request(),[
            'email'     => 'required',
            'password'  => 'required'
        ],[
            'email.required' => 'Email est obligatoire',
            'password.required' => 'Mot de passe est obligatoire',
        ]);

        // column to auth
        $column = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $user   = Administrateur::where([
            ["$column", $request->email]
        ])->first();

        // 2-if user exist
        if($user){

            // 3-if has password expired
            if($user->expire){
                $now = Carbon::now()->timestamp;
                $exp = Carbon::parse($user->expire_at)->timestamp;
                if($now > $exp){
                    $token = Str::random(60);
                    PasswordReset::create([
                        'token'     => $token,
                        'email'     => $user->email,
                        'created_at'=> Carbon::now()->addMinute(15)
                    ]);
                    return redirect(route('administrateur.connexion.new-password')."?token=$token");
                }
            }

            // 5-connect without double auth
            if(!$user->double_auth){
                if(Auth::guard('admin')->attempt(["$column"=> $request->email,'password'=> $request->password], $request->remember))
                {
                    return redirect()->route('administrateur./');
                    // return redirect()->intended(route('administrateur./'))->with('success','alert success');
                }else{
                    return redirect()->back()->withInput($request->only('email','remember'))->with('error','Email ou mot de passe incorrect');
                }
            }

            // 4-if has double auth
            if(Hash::check($request->password,$user->password))
            {
                DoubleAuth::where([
                    ['email',$user->email],
                    ['administrateur_id',$user->id]
                ])->delete();
                $auth = DoubleAuth::create([
                    'administrateur_id' => $user->id,
                    'email'             => $user->email,
                    'code'              => random_int(1000, 9999),
                    'expire'            => Carbon::now()->addMinute(15),
                    'token'             => Str::random(60),
                ]);
                $user->notify(new CodeAuthNotification($auth->code));
                return redirect(route('administrateur.code.form') . '?token='.$auth->token);
            }else{
                return back()->withError("Mot de passe incorrect");
            }
        }

        return back()->withError(" adresse e-mail ou nom d'utilisateur ($request->email) incorrect");

    }

    public function codeForm(){
        if(request()->filled('token')){
            $token = DoubleAuth::where('token',request('token'))->firstOrFail();
            if(Carbon::now()->format('Y-d-m H:i:s') < Carbon::parse($token->expire)->format('Y-d-m H:i:s')){
                return view('administrateur.utilisateurs.code');
            }else{
                DoubleAuth::where('email',$token->email)->delete();
                return redirect(route('administrateur.connexion'))->with('error', "Code de confirmation expire");
            }
        }
        return redirect(route('administrateur.connexion'))->with('error', "Token incorrect");
    }

    public function code()
    {
        $code = DoubleAuth::where('code',request('code'))->first();
        if($code){
            if(Carbon::now()->format('Y-d-m H:i:s') < Carbon::parse($code->expire)->format('Y-d-m H:i:s'))
            {
                if(Auth::guard('admin')->loginUsingId($code->administrateur_id))
                {
                    DoubleAuth::where('email',$code->email)->delete();
                    return redirect()->route('administrateur./');
                }
            }else{
                DoubleAuth::where('email',$code->email)->delete();
                return redirect(route('administrateur.code.form'))->with('error', "code de confirmation expire");
            }
            
        }else{
            return back()->with('error','code de confirmation non valide');
        }
        

        return redirect()->back()->withInput(request()->only('email','remember'))->with('error','alert error');
    }
}

