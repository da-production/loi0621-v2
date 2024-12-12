<?php

namespace App\Http\Livewire;

use App\Models\Administrateur;
use App\Models\Wilaya;
use Livewire\Component;

class AddUserWire extends Component
{
    public $nom;
    public $prenom;
    public $cod_wilaya;
    public $email;
    public $username;
    public $fonction;
    public $password = 'Cn@c*2021';
    public $password_confirmation = 'Cn@c*2021';
    public $role_id;
    public function render()
    {
        $wilayas = Wilaya::all();
        return view('livewire.add-user-wire', compact(['wilayas']));
    }

    public function store()
    {
        $this->validate([
            'nom'       => 'required|min:3|max:250',
            'prenom'    => 'required|min:3|max:250',
            'username'  => 'required|unique:administrateurs,username',
            'cod_wilaya'=> 'required|exists:wilayas,cod_wilaya',
            'email'     => 'required|email|max:250|unique:administrateurs,email',
            'fonction'  => 'required|min:3|max:250',
            'password'  => 'required|min:8|max:250|confirmed',
            'role_id'   => 'required'
        ]);
        Administrateur::create([
            'nom'       => $this->nom,
            'prenom'    => $this->prenom,
            'username'  => $this->username,
            'cod_wilaya'=> $this->cod_wilaya,
            'email'     => $this->email,
            'fonction'  => $this->fonction,
            'password'  => bcrypt($this->password),
            'role_id'   => $this->role_id,
            'status'    => 1
        ]);
        $this->resetAll();
    }

    public function resetAll()
    {
        $this->nom                      = '';
        $this->prenom                   = '';
        $this->cod_wilaya               = '';
        $this->email                    = '';
        $this->username                 = '';
        $this->fonction                 = '';
        $this->password                 = '';
        $this->password_confirmation    = '';
        $this->role_id                  = '';
    }
}
