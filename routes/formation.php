<?php

use Illuminate\Support\Facades\Route;


/**
 * Documentations
 * @groups:[1]
 * @Route: Formation for employeurs space (FrontEnd)
 * @Controllers: [SubventionController,FormationController]
 * @middleware: [auth] => need employeurs be login
 * @alias: formation.
 * @prefix url: employeur/formation
 */

Route::group([
    'middleware'    => ['auth'],
    'as'            => 'formation.',
    'prefix'        => 'employeur/formation'
], function () {
    /**
     * @method: GET
     * @action: upload files for each request 
     * @param: null
     * @return view
     */
    Route::get('/upload', 'SubventionController@files')->name('upload.files');

    /**
     * @method: GET
     * @action: display liste of demandes
     * @param: (null)
     * @return view
     */
    Route::get('/demandes', 'FormationController@demandeList')->name('demande.list');

    /**
     * @method: GET
     * @action: show details of demande
     * @param: (num_dossier)
     * @return view
     */
    Route::get('/demande/{num_dossier}', 'FormationController@demande')->name('demande.detail');

    /**
     * @method: GET
     * @action: display the form to create new demande
     * @param: null
     * @return view
     */
    Route::get('/nouveau', 'FormationController@create')->name('demande.create');

    /**
     * @method: POST
     * @action: store new demande
     * @param: null
     * @return: return response
     */
    Route::post('/nouveau', 'FormationController@newDemandeStore')->name('demande.store');
});
