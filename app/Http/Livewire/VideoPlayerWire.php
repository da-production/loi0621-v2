<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VideoPlayerWire extends Component
{
    public $playlist;
    public $url;

    public $randomID;

    public function mount()
    {
        $this->randomID = 'id_' . random_int(0,9999);
        $this->playlist = [
            'Login' => [
                'title'         => 'Connexion',
                'description'   => 'Description',
                'updated_at'    => '2023-05-02',
                'url'           => 'untitled1.m3u8',
                'only'          => 'Administrateur',
            ],
            'UpdateProfile' => [
                'title'         => 'Mettre à jour le profil',
                'description'   => 'Description',
                'updated_at'    => '2023-05-02',
                'url'           => 'untitled3.m3u8',
                'only'          => 'tout le monde',
            ],
            'Logout'=> [
                'title'         => 'Deconnexion',
                'description'   => 'Description',
                'updated_at'    => '2023-05-02',
                'url'           => 'untitled2.m3u8',
                'only'          => 'tout le monde',
            ]
        ];
        
        $this->url = $this->playlist['Login']['url'];
    }
    public function render()
    {
        return view('livewire.video-player-wire');
    }

    public function changed($url)
    {
        $this->randomID = 'id_' . random_int(0,9999);
        $this->url = $url;
    }
}
