<?php

namespace App\Helpers;

use App\Models\Permission;

class ConditionChecker
{
    /**
     * Vérifie une condition basée sur les paramètres donnés.
     *
     * @param mixed $param1 Premier paramètre
     * @param mixed $param2 Deuxième paramètre
     * @return bool Retourne true si la condition est remplie, sinon false
     */
    public static function check($entite, $action)
    {
        // Exemple de logique : vérifier si les deux paramètres sont égaux
        return Permission::Permission($entite, $action);
    }
}
