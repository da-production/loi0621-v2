<?php

namespace App\Http\Livewire\Employeur;

use App\Models\User;
use Livewire\Component;

class UpdateProfileWire extends Component
{
    public $success = false;
    public $nom;
    public $prenom;
    public $password;
    public $password_confirmation;
    public function mount()
    {
        $this->nom = auth()->user()->nom;
        $this->prenom = auth()->user()->prenom;
    }
    public function render()
    {
        return view('livewire.employeur.update-profile-wire');
    }

    public function updating(){
        $this->success =false;
    }

    public function updateProfile()
    {
        $this->validate([
            'nom'       => 'required|min:3',
            'prenom'    => 'required|min:3',
        ],[],[
            'nom'   => 'Nom',
            'prenom'    => 'Pénom'
        ]);
        $data = [
            'nom'       => $this->nom,
            'prenom'    => $this->prenom,
        ];
        if(!is_null($this->password))
        {
            $this->validate([
                'password'  => 'min:8|confirmed',
            ],[],['password'=>'Mot de Passe']);
            $data['password']= bcrypt($this->password);
        }
        User::where('code_employeur',auth()->user()->code_employeur)
        ->update($data);
        $this->success = true;
    }
}
