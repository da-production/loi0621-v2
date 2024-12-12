<?php

namespace App\Http\Controllers\Administrateur;

use App\Models\Administrateur;
use App\Models\Employeur;
use App\Http\Requests\UtilisateurStoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Wilaya;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function index()
    {
        $where = [
            ['role_id','!=',1]
        ];
        if(auth()->user()->cannot('view-any',Administrateur::class)){
            if(auth()->user()->can('view',Administrateur::class)){
                array_push($where,['cod_wilaya', auth()->user()->cod_wilaya]);
            }else{
                abort(403);
            }
        }
        $users = Administrateur::with(['wilaya'])->where($where)->orderBy('cod_wilaya','ASC')->paginate(10);
        
        return view('administrateur.utilisateurs.index', compact(['users']));
    }

    public function store(UtilisateurStoreRequest $request)
    {
        $user = new Administrateur();
        //$user->id = $request->id;
        // $last = DB::table('administrateurs')->orderBy('id','DESC')->get('id')->first();
        
        // //dd($last);
        // $user->id = (int)$last->id+1;

        
        $user->cod_wilaya = $request->cod_wilaya;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->username = $request->username;
        $user->fonction = $request->fonction;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->status = 1;
        if ($user->save()) return back()->with('success', "utilisateur $user->nom $user->prenom a été créé avec succès");
    }

    public function edit($username)
    {
        if(auth()->user()->cannot('view-any',Administrateur::class)){
            if(auth()->user()->can('view',Administrateur::class)){
                array_push($where,['cod_wilaya', auth()->user()->cod_wilaya]);
            }else{
                abort(403);
            }
        }
        $user = Administrateur::where([
            ['username', $username],
        ])->firstOrFail();
        $wilayas = Wilaya::all();
        return view('administrateur.utilisateurs.edit', compact(['user', 'wilayas']));
    }

    public function update(UpdateUserRequest $request, $user)
    {
        $data = [...$request->validated()];
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }else{
            unset($data['password']);
        }

        Administrateur::where('username', $user)->update($data);
        return back()->with('success', "profil a été mis à jour avec succès");
    }
    
    public function security(Request $request){
        if($request->filled('id')){
            $id = Administrateur::where('id',$request->id)->pluck('id')->firstOrFail();
            Administrateur::where('id',$id)->update([
                'expire'        => $request->filled('expire') ? 1 : 0,
                'expire_at'     => $request->filled('expire') ?  Carbon::now()->addMonths(2) : null,
                'double_auth'   => $request->filled('double_auth') ? 1 : 0,
            ]);
            return back()->withSuccess("la sécurité du compte a été mise à jour");
        }else{
            return back();
        }
    }
}
