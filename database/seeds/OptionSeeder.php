<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Option::insert([
            ['name'=>'appname', 'value'=>'loi0621','instance'=> 'Option', 'widget'=>'text' ,'autoload'=>true],
            ['name'=>'description', 'value'=>'loi0621','instance'=> 'Option', 'widget'=>'text' ,'autoload'=>true],
            ['name'=>'keywords', 'value'=>'loi0621','instance'=> 'Option', 'widget'=>'tag' ,'autoload'=>true],
            ['name'=>'alert', 'value'=>'','instance'=> 'Option', 'widget'=>'textarea' ,'autoload'=>true],
            ['name'=>'hide_alert', 'value'=>'','instance'=> 'Option', 'widget'=>'date' ,'autoload'=>true],

            // administrateur
            ['name'=>'double_auth', 'value'=>'1','instance'=> 'Administrateur', 'widget'=>'checkbox' ,'autoload'=>true],
            ['name'=>'expire_password', 'value'=>'1','instance'=> 'Administrateur', 'widget'=>'checkbox' ,'autoload'=>true],
            ['name'=>'expire_duration', 'value'=>'2','instance'=> 'Administrateur', 'widget'=>'number' ,'autoload'=>true],
            ['name'=>'reset_password', 'value'=>'1','instance'=> 'Administrateur', 'widget'=>'checkbox' ,'autoload'=>true],

            // user
            ['name'=>'double_auth', 'value'=>'1','instance'=> 'User', 'widget'=>'checkbox' , 'autoload'=>true],
            ['name'=>'reset_password', 'value'=>'1','instance'=> 'User', 'widget'=>'checkbox' , 'autoload'=>true],
        ]);
    }
}
