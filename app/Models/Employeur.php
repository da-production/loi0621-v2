<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SsmsDateTime;

class Employeur extends Model
{
    use HasUuid, SsmsDateTime;
    protected $fillable = [
        'id','numero','cod_stat','cod_branche','date_debut_activite',
        'cod_wilaya','adresse','adresseAr','raison_social','raison_social_Ar',
        'sigle','code_employeur','representant','representantAr','qualite',
        'qualiteAr','tel','mob','email_entreprise','RIB','NIF','NIS','RC',
        'nbr_travailleurs','condition_accepte'
    ];
    // public function getDateFormat()
    // {
    //     return 'Y-d-m H:i:s.v';
    // }

    public function mails(){
        return $this->hasMany(EmployeurMail::class,'code_employeur','numero');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class,'code_employeur','code_employeur')->where('owner',1);
    }
    public function lastTicket()
    {
        return $this->hasOne(Ticket::class,'code_employeur','code_employeur')->where('owner',1)->latest();
    }
    public function branche()
    {
        return $this->hasOne(Branche::class, 'cod_branche', 'cod_branche');
    }
    public function statuJuridique()
    {
        return $this->hasOne(StatuJuridique::class, 'cod_stat', 'cod_stat');
    }

    public function wilaya()
    {
        return $this->hasOne(Wilaya::class, 'cod_wilaya', 'cod_wilaya');
    }

    public function agents()
    {
        return $this->hasMany(Administrateur::class,'cod_wilaya','cod_wilaya')->whereIn('role_id',['4','5']);
    }

    public function subFiles()
    {
        return $this->hasMany(File::class, 'code_employeur', 'code_employeur');
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class, 'code_employeur', 'code_employeur');
    }

    public function subventions()
    {
        return $this->hasMany(Subvention::class, 'code_employeur', 'code_employeur')->orderBy('created_at', 'DESC');
    }
    public function subvention()
    {
        return $this->hasOne(Subvention::class, 'code_employeur', 'code_employeur')->latest();
    }
    public function subventionDecesionNull(){
        return $this->hasOne(Subvention::class,'code_employeur','code_employeur')->where([
            ['decision_dos','=',NULL]
        ])->latest();
    }

    public function formationDecesionNull(){
        return $this->hasOne(Formation::class,'code_employeur','code_employeur')->where([
            ['decision_dos','=',NULL]
        ])->latest();
    }
    public function formation()
    {
        return $this->hasOne(Formation::class, 'code_employeur', 'code_employeur')->latest();
    }

    public function formations()
    {
        return $this->hasMany(Formation::class, 'code_employeur', 'code_employeur')->orderBy('created_at', 'DESC');;
    }

    public function user()
    {
        return $this->belongsTo(User::class,'code_employeur','code_employeur');
    }


    protected $casts = [
        'id' => 'string'
    ];
    //public $timestamps  = false;

    public static function motifRejet($motif = null)
    {
        $motifs = [
            1 => "Manque de pièces",
            2 => "Non à jour vis-à-vis de la CNAS ",
            3 => "Date d'inscription à l'agence de placement postérieure à la date de recrutement ",
            4 => "Date de recrutement antérieure à la date de promulgation de la loi",
            5 => "Autre",
        ];

        if (is_null($motif)) return $motifs;

        return $motifs[$motif];
    }
}
