<?php

namespace App\Http\Controllers\Auth;

use App\Models\DoubleAuth;
use App\Http\Controllers\Controller;
use App\Notifications\CodeAuthNotification;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Option;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->redirectTo = route('employeur.profile');
    }

    public function login(Request $request)
    {
        /**
         * TODO : add auth double facteur
         * 1/ validate inputs with custom messages
         * 2/ check if email or code existe with password
         * 3/ generate code pine of 4 digits with token and store it in the database + expiration of 15min
         * 4/ redirect to code form with token
         */
        // store all input request
        $input = $request->all();
        // 1/ validate inputs [v] with custom messages [x]
        $this->validate($request, [
            //'g-recaptcha-response' => 'required|captcha',
            'email' => 'required|string',
            'password' => 'required',
        ]);

        // 2/ check if email or code existe
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'code_employeur';
        $user = User::where($fieldType,$request->email)->first();


        // Delete me turn of double auth
        // if (auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password']))) {
        //     if (auth()->user()->Expired) {
        //         return redirect(route('login'))->with('error', 'Votre Compte a été desactiver');
        //     }
        //     return redirect()->route('employeur.profile');
        // } else {
        //     return redirect()
        //         ->route('login')
        //         ->with('error', 'L\'Identifiant ou le mot de passe est incorrect.')->withInput();
        // }
        // end delete me
        

        // check if double auth it's activated
        $option = Option::where([
            ['name','double_auth'],
            ['instance','User']
        ])->first();

        if($option->value == '1'){
            if($user){
                // if user exist
                // 2-1/ check password hash
                if(Hash::check($request->password,$user->password)){
                    DoubleAuth::where([
                        ['email',$user->email],
                        ['administrateur_id',$user->id]
                    ])->delete();
                    $token = Str::random(60);
                    $auth = DoubleAuth::create([
                        'administrateur_id' => $user->id,
                        'email'             => $user->email,
                        'code'              => random_int(1000, 9999),
                        'expire'            => Carbon::now()->addHour()->addMinutes(15),
                        'token'             => $token,
                    ]);
                    $user->notify(new CodeAuthNotification($auth->code));
                    return redirect(route('employeur.code.form') . '?token='.$auth->token);
                }else{
                    return back()->withError('(email / code employeur) ou mot de passe incorrect')->withInput();
                }
            }else{
                // if user doesn't exist
                return back()->withError('l\'utilisateur n\'existe pas')->withInput();
            }
    
        }else{
            // attempt to login
            if (auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password']))) {
                if (auth()->user()->Expired) {
                    return redirect(route('login'))->with('error', 'Votre Compte a été desactiver');
                }
                return redirect()->route('employeur.profile');
            } else {
                return redirect()
                    ->route('login')
                    ->with('error', 'L\'Identifiant ou le mot de passe est incorrect.')->withInput();
            }
        }
        
        
    }

    public function codeForm()
    {
        /**
         * TODO :
         * 1/ check if token isset [✔]
         * 2/ check if token is expired or not [x]
         * 3/ login if code is true [✔]
         */

        // 1/ check if token isset
        if(request()->filled('token')){
            $token = DoubleAuth::where('token', request('token'))->pluck('expire');
            return view("auth.code");
        }
        return redirect(route('login'))->withError("réessayez s'il vous plaît");
    }

    public function loginCode()
    {
        $code = DoubleAuth::where('code',request('code'))->first();
        if($code){
            if(Carbon::now()->format('Y-d-m H:i:s') < Carbon::parse($code->expire)->format('Y-d-m H:i:s'))
            {
                if(Auth::loginUsingId($code->administrateur_id))
                {
                    DoubleAuth::where('email',$code->email)->delete();
                    return redirect()->route('employeur.profile');
                }
            }else{
                DoubleAuth::where('email',$code->email)->delete();
                return redirect(route('login'))->with('error', "code de confirmation expire");
            }
            
        }else{
            return back()->with('error','code de confirmation non valide');
        }
        

        return redirect()->back()->withInput(request()->only('email','remember'))->with('error','alert error');
    }

    public function logout(Request $request)
    {
        if(Auth::guard('admin')->check())
        {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('administrateur.connexion');
        }else {
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
