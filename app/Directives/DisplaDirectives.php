<?php

namespace App\Directives;

use Illuminate\Support\Facades\Blade;

class DisplaDirectives
{
    /**
     * Enregistre les directives Blade personnalisées
     */
    public static function register()
    {
        // Définir le directive @display pour ouvrir un bloc conditionnel
        Blade::directive('display', function ($expression) {
            // Générer du PHP pour vérifier une condition avec une méthode personnalisée
            return "<?php if (\\App\\Helpers\\ConditionChecker::check($expression)): ?>";
        });

        // Définir le directive @enddisplay pour fermer le bloc conditionnel
        Blade::directive('enddisplay', function () {
            return "<?php endif; ?>";
        });
    }
}
