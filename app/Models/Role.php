<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    /**
     * @Description: the format value of datetime(timestamp) for SQL
     * @return String format datetime
     */
    public function getDateFormat()
    {
        return 'Y-d-m H:i:s.v';
    }

    /**
     * @Description: display the name of each role
     * @param $roleID|null
     * @return String|Array if $orleID is null return array else return String
     */
    public static function display($role = null)
    {

        $roles = [
            1   => 'Administrateur (Root)',
            2   => 'Administrateur',
            3   => 'Administrateur Agence (Informaticien)',
            4   => 'Charge de Dossier',
            5   => 'Suppleant',
            6   => 'Consultant Agence',
            7   => 'Agent Support',
        ];

        if (is_null($role)) {
            return $roles;
        }

        return $roles[$role];
    }

    /**
     * @description: dispaly discription for each role
     * @param intiger $roleID
     * @return String  
     */
    public static function description($role)
    {
        $roles = [
            1   => 'Tous les previllages + Consultant Statiqtique 48 wilaya',
            2   => 'Consultant Statiqtique 48 wilaya',
            3   => 'Modification des compte agence',
            4   => 'Chargé du Suivi du dossier',
            5   => 'Suppleant (Remplace le chargé du dossier lors de son absence)',
            6   => 'Consultant Statiqtique par agence',
            7   => 'Charger du support des tickets',
        ];
        return $roles[$role];
    }

    /**
     * @description: permission method check if the user is allowed to do action or has access to the views 
     * @param String $table name
     * @param String $ability ['c':'create','r':'read','u':'update','d':'delete']
     * @param intiger $role [1...6]
     * @return Boolean true|false
     */
    public static function permissions($table, $ability, $role)
    {
        if (!array_key_exists($table, \config('permissions'))) return false;

        switch ($table) {
            case $table:
                if (\in_array($role, \config('permissions')[$table][$ability])) return true;
                break;
            default:
                return false;
                break;
        }

        return false;
    }
}
