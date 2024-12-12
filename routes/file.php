<?php

use Illuminate\Support\Facades\Route;


/**
 * Documentations
 * @groups:[4]
 * @Route: FileSystem for employeurs space (FrontEnd) 
 * @Controllers: [FileController]
 * @middleware: [auth] => need employeurs be login
 * @alias: formation.
 *  * @prefix url group1: employeur/subvention/fichier/upload/
 *  * @prefix url group1: employeur/subvention/fichier/download/
 *  * @prefix url group1: employeur/formation/fichier/upload/
 *  * @prefix url group1: employeur/formation/fichier/download/
 */


/**
 * Group: Upload Subvention
 */
Route::group([
    'middleware'    => ['auth'],
    'as'            => 'subvention.upload.',
    'prefix'        => 'employeur/subvention/fichier/upload/'
], function () {
    /**
     * @method: GET
     * @action: display form to upload files for selected demande
     * @param: (code_demande) @required
     * @return view
     */
    Route::get('/employeur/{code_demande}', 'FileController@subventionShow')->name('employeur.show');

    /**
     * @method: GET
     * @action: display form to upload files for selected demande 
     * @param: (code_demande) @required
     * @return view
     * @PS: route disabled
     */
    Route::get('/employe', 'FileController@employeShow')->name('employe.show');

    /**
     * @method: get
     * @action: download file
     * @param: (name) @required
     * @return response 
     */
    Route::get('/telecharger/{name}', 'FileController@downloadFiles')->name('downloadFiles');

    /**
     * @method: POST
     * @action: Store the subvention file 
     * @param: (null)
     * @return view
     * @PS: route disabled
     */
    Route::post('/statique', 'FileController@uploadSubvention')->name('store');
});


/**
 * Group: Download Subvention
 */
Route::group([
    'middleware'    => ['auth'],
    'as'            => 'subvention.download.',
    'prefix'        => 'employeur/subvention/fichier/download/'
], function () {
    /**
     * @method: get
     * @action: download file
     * @param: (name) @required
     * @return response 
     */
    Route::get('/{name}', 'FileController@downloadFiles')->name('files');
});




/**
 * Group: Upload Formation
 */
Route::group([
    'middleware'    => ['auth'],
    'as'            => 'formation.upload.',
    'prefix'        => 'employeur/formation/fichier/upload/'
], function () {
    /**
     * @method: GET
     * @action: display form to upload files for selected demande
     * @param: (code_demande) @required
     * @return view
     */
    Route::get('/employeur/{code_demande}', 'FileController@formationShow')->name('employeur.show');

    /**
     * @method: POST
     * @action: Store the formation file 
     * @param: (null)
     * @return view
     * @PS: route disabled
     */

    Route::post('/statique', 'FileController@uploadFormation')->name('store');
});

/**
 * Group: Download Subvention
 */
Route::group([
    'middleware'    => ['auth'],
    'as'            => 'formation.download.',
    'prefix'        => 'employeur/formation/fichier/download/'
], function () {
    /**
     * @method: get
     * @action: download file
     * @param: (name) @required
     * @return response 
     */
    Route::get('/{name}', 'FileController@downloadFiles')->name('files');
});
