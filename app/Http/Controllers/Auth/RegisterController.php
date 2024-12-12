<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserStepOneRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Wilaya;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');

        $this->redirectTo = $this->getTypeRegister();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    private function getTypeRegister()
    {

        // if (isset($_POST['type'])) {

        //     $type = $_POST['type'];

        //     if ($type == 1) {
                
        //         return route('employeur.subvention.inscription');
        //     }
        //         if ($type == 2) {
        //         return route('employeur.formation.inscription');
        //     }
        //     return false;
        //     // if($type == 2) return route('employeur.formation');session()->put('inscrit','Pour compléter votre inscription veuillez remplire le formulaire suivant');

        //     // if($type == 1) return route('employeur.subvention.inscription');session()->put('inscrit','Pour compléter votre inscription veuillez remplire le formulaire suivant');
        //     // if($type == 2) return route('employeur.formation');session()->put('inscrit','Pour compléter votre inscription veuillez remplire le formulaire suivant');

        // }
        // return false;

        return route('employeur.inscription');
    }


    protected function validator(array $data)
    {
        $inputs = [
            // 'g-recaptcha-response' => 'required|captcha',
            // 'type'          => ['required', 'string', 'min:1', 'max:1'],
            'nom'           => ['required', 'string', 'max:255'],
            'prenom'        => ['required', 'string', 'max:255'],
            'code_employeur' => ['required', 'string', 'max:10', 'regex:/[0-9]{10}/','unique:users'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:8', 'confirmed', 'regex:/[@$!%*#?&]/', 'regex:/[0-9]/', 'regex:/[a-z]/', 'regex:/[A-Z]/'],
            'cod_wilaya'    => ['required']
        ];
        $messages = [
            // 'type.required' => 'Type inscription est obligatoire',
            // 'type.string' => 'Type inscription est obligatoire',
            // 'type.min' => 'Type inscription est obligatoire',
            // 'type.max' => 'Type inscription est obligatoire',
            'email.required' => 'Veuillez saisir votre email',
            'email.unique' => 'Cet email a déjà été pris',
            'code_employeur.required' => 'Veuillez saisir votre code employeur',
            'code_employeur.unique' => 'Ce Code Employeur a déjà été pris',
            'code_employeur.regex'   => "Le format du code employeur non valide.",
            'g-recaptcha-response.required' => 'Le Captcha est obligatoire',
            'nom.unique' => 'Veuillez saisir votre nom',
            'prenom.unique' => ' Veuillez saisir votre Prenom',
            'password.regex'    => ' Mot de passe non complexe (miniscule/majuscule/caractere/chiffres)',
            'cod_wilaya.required'  => 'Veuillez saisir votre Wilaya',
        ];
        return Validator::make($data, $inputs, $messages);
        
    }

    protected function create(RegisterUserStepOneRequest $request,array $data)
    {
        dd($request->all());
        return User::create([
            'nom'           => $data['nom'],
            'prenom'        => $data['prenom'],
            'code_employeur' => $data['code_employeur'],
            'role_id'       => 3,
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'cod_wilaya'    => $data['cod_wilaya'],
            // 'guide'         => 0,
            // 'Expired'       => 0,
            // 'Expired_at'    => \Carbon\Carbon::now()->toDateTimeString(),   
        ]);
        
    }

    public function checkEmployeurApi($code){
        $response = Http::post("https://teledeclaration.cnas.dz/srv/cnas/cotisant/cnac/$code?usr=cnac&pwd=FD@85_GKwsD01")->json();
        
        if(is_null($response['cotisant']['statut'])){
            return response()->json([],404);
        }else{
            return $response['message'];
        }
    }

    public function register(RegisterUserStepOneRequest $request)
    {
        $responseApi = $this->checkEmployeurApi($request->code_employeur);
        // todo log to file
        if(is_null($responseApi)) return back()->with('error','erreur serveur veuillez réessayer')->withInput($request->input());
        if($responseApi == '00'){
            $user = User::create([
                ...$request->validated(),
                'cod_wilaya'    => substr($request->code_employeur, 0, 2),
                'password'      => Hash::make($request->password),
                'role_id'       => 3,
                'guide'         => 0,
            ]);
            $this->guard()->login($user);
            return $request->wantsJson()
                        ? new JsonResponse([], 201)
                        : redirect($this->redirectPath());
        }else{
            return back()->with('error',$responseApi)->withInput($request->input());
        }

    }

    public function showRegistrationForm()
    {
        $wilayas = Wilaya::all();
        return view('employeur.inscription', compact('wilayas'));
        
    }
}
