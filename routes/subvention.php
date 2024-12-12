<?php

use Illuminate\Support\Facades\Route;

/**
 * Documentations
 * @groups:[1]
 * @Route: Subvention for employeurs space (FrontEnd)
 * @Controllers: [SubventionController]
 * @middleware: [auth] => need employeurs be login
 * @alias: subvention.
 * @prefix url: employeur/subvention
 */

Route::group([
    'middleware'    => ['auth'],
    'as'            => 'subvention.',
    'prefix'        => 'employeur/subvention'
], function () {
    /**
     * @method: GET
     * @action: upload files for each request 
     * @param: null
     * @return view
     */
    Route::get('/upload', 'SubventionController@files')->name('upload.files');

    // display all demandes liste
    Route::get('/demandes', 'SubventionController@demandeList')->name('demande.list');

    /**
     * @method: GET
     * @action: show detail of one demande
     * @param: (num_dossier) required
     * @return: view
     */
    Route::get('/demande/{num_dossier}', 'SubventionController@demande')->name('demande.detail');

    /**
     * @method: GET
     * @action: show the form to create new demande
     * @param: null
     * @return: view
     */
    Route::get('/nouveau', 'SubventionController@create')->name('demande.create');

});
