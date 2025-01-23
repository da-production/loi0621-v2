<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Traits\SsmsDateTime;

class Demande extends Model
{
    use HasFactory, SsmsDateTime;


    public static function Status($statu = null){
        $status = [
            null => [
                'className'     => 'warning',
                'label'         => "en cours de traitement"
            ],
            0   => [
                'className'     => 'danger',
                'label'         => "Notification rejet"
            ],
            1   => [
                'className'     => 'success',
                'label'         => "Notification accord"
            ],
        ];

        return $status[$statu];
    }

    public function employeur()
    {
        return $this->belongsTo(Employeur::class,'code_employeur','code_employeur');
    }

    public function files()
    {
        return $this->hasMany(File::class,'code_demande','cod_demande');
    }

    public function getDays()
    {
        $options = cache('options') ?: null;
        $days = 15;
        if(!is_null($options)){
            $days = $options->where('name','delai_traitement')->pluck('value')->first() ?: 10;
        }
        return now()->gte(Carbon::parse($this->date_reception_dos)->addDays((int)$days));
    }

    public function getDiffDate()
    {
        $options = cache('options') ?: null;
        $days = 15;
        if(!is_null($options)){
            $days = $options->where('name','delai_traitement')->pluck('value')->first() ?: 10;
        }
        return Carbon::parse($this->date_reception_dos)->addDays($days)->diffInDays(now());
    }

    public function getDiffDateExpiredPercentage(){
        $options = cache('options') ?: null;
        $days = 15;
        if(!is_null($options)){
            $days = $options->where('name','delai_traitement')->pluck('value')->first() ?: 10;
        }
        $start = now()->timestamp;
        $end = Carbon::parse($this->date_reception_dos)->addDays($days)->timestamp;
        $between = ($start * 100) / $end;
        /**
         * 100% = $end
         * 0% = $start
         */
        dd("start $start", "end $end", $between);
    }

    protected $casts = [
        'annuler_at'        => 'string',
    ];
}
