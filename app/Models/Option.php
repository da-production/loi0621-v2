<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //

    protected $fillable = [
        'name', 'value', 'instance', 'widget' ,'order', 'autoload'
    ];


    public static function widget($widget=null)
    {
        $widgets = [
            'text'  => [
                'type'  => 'text',
                'class' => 'form-control',
            ]
        ];

        return is_null($widget) ? $widgets : $widgets[$widget];
    }
    
}
