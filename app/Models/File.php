<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable = ['id','title','slug','url','code_file','file_type','code_employeur','code_demande'];

    public static function TypeFormation($type = null) {
        $types = [
            'remboursement'         => [
                'code'=>'fe-1', 
                'title'=>"Demande de remboursement de la cotisation globale de sécurité sociale"
            ],
            'listeTravailleurs'     => [
                'code'=>'fe-2',
                'title'=>"Liste des travailleurs concernés par la formation"
            ],
            'contrats'              => [
                'code'=>'fe-3',
                'title'=>"Contrats de formation "
            ],
            'attestationsFormation' => [
                'code'=>'fe-4',
                'title'=>"Attestations de formation"
            ],
            'etatVersementv'        => [
                'code'=>'fe-5',
                'title'=>"Etat de versement des cotisations de sécurité sociale au titre des travailleurs concernés"
            ],
        ];
        return is_null($type) ? $types : $types[$type];
    }

    public static function TypeSubvention($type = null) {
        $types = [
            'octroi'                => [
                'code'=>'se-1', 
                'title'=>"Demande d’octroi de la subvention mensuelle à l’emploi"
            ],
            'decisionOctroi'        => [
                'code'=>'se-2',
                'title'=>"Decision d'octroi des avantages délivrée par la CNAS "
            ],
            'listeTravailleurs'     => [
                'code'=>'se-3',
                'title'=>"Liste des travailleurs recrutés par contrat à durée indéterminée CDI"
            ],
            'sdiSalaries'           => [
                'code'=>'se-4',
                'title'=>"CDI des salariés"
            ],
            'justificatif'        => [
                'code'=>'se-5',
                'title'=>"Justificatif de l’agence de placement à l’emploi pour les travailleurs recrutés."
            ],
        ];
        return is_null($type) ? $types : $types[$type];
    }

    // public function getDateFormat()
    // {
    //     return 'Y-d-m H:i:s.v';
    // }
    public static function autorizedFile($file){
        $size = $file->getSize();
        $extensions =  ['pdf'];
        $errors=[];
    
        if($size > 2186110 ){
            $errors['size'] = 'Error size';
            return back()->with('fileErrors','La taille du fichier est supérieure à 2 MO');
        }
    
        if(!in_array($file->extension(), $extensions)){
            $errors['extension'] = 'Error extension';
            return back()->with('fileErrors','Extension non autorisée, veuillez télécharger un fichier au format [PDF]');
        }
        if(empty($errors)){
            return true;
        }
        return false;
    }

    public function subvention()
    {
        return $this->belongsTo(Subvention::class,'cod_demande','code_demande');
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class,'cod_demande','code_demande');
    }

    protected $casts = [
        'id'=> 'string'
    ];
}
