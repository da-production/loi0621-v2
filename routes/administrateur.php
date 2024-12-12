<?php

use App\Http\Controllers\Administrateur\AdministrateurController;
use App\Http\Controllers\Administrateur\OptionController;
use App\Http\Controllers\SteperController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('admin', 'AdministrateurController@index');

Route::group(['prefix' => 'administrateur', 'as' => 'administrateur.'], function () {

    Route::get('/connexion', 'LoginController@showLoginForm')->name('connexion');
    Route::post('/connexion', 'LoginController@login')->name('connexion.submit')->middleware('throttle:5,1');
    Route::get('/code/form', 'LoginController@codeForm')->name('code.form');
    Route::get('/new-password', 'LoginController@showNewPassword')->name('connexion.new-password');
    Route::post('/new-password', 'LoginController@NewPassword')->name('connexion.new-password.store')->middleware('throttle:5,1');
    Route::post('/login/start', 'LoginController@code')->name('code')->middleware('throttle:5,1');
    Route::get('password/email',[AdministrateurController::class,'ResetWithEmailForm'])->name('password.email');
    Route::post('password/email',[AdministrateurController::class,'SendResetToEmail'])->name('password.reset');
    Route::get('password/email/form',[AdministrateurController::class,'ResetPasswordForm'])->name('password.reset.form');
    Route::post('password/reset',[AdministrateurController::class, 'ResetPassword'])->name('password.reset.post');

});

Route::group([
    'middleware'    => ['auth:admin'],
    'prefix'        => 'administrateur',
    'as'            => 'administrateur.',
], function () {
    /**
     * User
     */
    Route::get('/', 'AdministrateurController@profile')->name('/');
    Route::put('/update/profile', 'AdministrateurController@update')->name('update');
    Route::get('/utilisateur/ajouter', 'AdministrateurController@create')->name('utilisateur.create');
    Route::get('/utilisateurs', 'UserController@index')->name('utilsateurs');
    Route::post('/utilisateur/ajouter/store', 'UserController@store')->name('utilisateur.store');
    Route::get('/utilisateur/modifier/{username}', 'UserController@edit')->name('utilisateur.edit');
    Route::put('/utilisateur/modifier/{user}', 'UserController@update')->name('utilisateur.update');
    Route::get('/telechargement/{fileID}','AdministrateurController@telechargement')->name('telechargement');
    Route::put('/utilisateur/update/security', 'UserController@security')->name('utilisateur.security');
    Route::get('statistique',[AdministrateurController::class,'Statistique'])->name('statistique');
    Route::get('statistique/api',[AdministrateurController::class,'StatistiqueAPI'])->name('statistique.api');


    /** Parametre */
    Route::get('/roles', 'RoleController@index')->name('roles');
    Route::get('/branches', 'BrancheController@index')->name('branches');
    Route::get('/statuJuridique', 'StatutJuridiqueController@index')->name('statuJuridique');
    Route::get('/wilayas', 'WilayaController@index')->name('wilayas');
    Route::get('reglage',[OptionController::class,'Index'])->middleware('onlyRoot')->name('reglage');
    Route::get('stepers',[SteperController::class,'Index'])->middleware('onlyRoot')->name('stepers');
    Route::get('guide',[OptionController::class,'Guide'])->name('guide');
    Route::get('tickets',[TicketController::class,'Index'])->name('tickets');

    /**Employeur */
    Route::group(['prefix'=>'employeurs','as'=>'employeurs.'], function(){
        Route::get('/','EmployeurAdministrateurController@index')->name('/');
        Route::get('/detail/{code_employeur}','EmployeurAdministrateurController@detail')->name('detail');
    });

    Route::group(['prefix'=>'subventions', 'as'=>'subventions.'], function(){
        Route::get('/','SubventionAdministrateurController@index')->name('/');
        Route::get('/detail/{cod_demande}','SubventionAdministrateurController@detail')->name('detail');
        Route::get('/inscriptions','SubventionAdministrateurController@inscription')->name('inscription');
        Route::get('/receptionDossier','SubventionAdministrateurController@receptionDos')->name('receptionDos');
        Route::get('/traitementDossier','SubventionAdministrateurController@traitement')->name('traitement');
        Route::get('/decisionAccord','SubventionAdministrateurController@decisionaccord')->name('decisionaccord');
        Route::get('/decisionRejet','SubventionAdministrateurController@decisionrejet')->name('decisionrejet');
        Route::put('/receptionDossier','SubventionAdministrateurController@storeReception')->name('store.receptiondossier');

        /**
         * @Description: Route for storing Decsion
         */
        Route::post('/decisionAccordRejet', 'SubventionAdministrateurController@DecisionAccordRejet')->name('store.decision');
    });

    Route::group(['prefix'=>'formations', 'as'=>'formations.'], function(){
        Route::get('/','FormationAdministrateurController@index')->name('/');
        Route::get('/detail/{cod_demande}','FormationAdministrateurController@detail')->name('detail');
        Route::get('/inscriptions','FormationAdministrateurController@inscription')->name('inscription');
        Route::get('/receptionDossier','FormationAdministrateurController@receptionDos')->name('receptionDos');
        Route::get('/traitementDossier','FormationAdministrateurController@traitement')->name('traitement');
        Route::get('/decisionAccord','FormationAdministrateurController@decisionaccord')->name('decisionaccord');
        Route::get('/decisionRejet','FormationAdministrateurController@decisionrejet')->name('decisionrejet');
        Route::put('/receptionDossier','FormationAdministrateurController@storeReception')->name('store.receptiondossier');

        /**
         * @Description: Route for storing Decsion
         */
        Route::post('/decisionAccordRejet', 'FormationAdministrateurController@DecisionAccordRejet')->name('store.decision');
    });

    Route::group([
        'prefix'    =>'test',
        'as'        => 'test.'
    ], function(){
        Route::get('/messages','AdministrateurController@messageShow')->name('message');
        Route::post('/messages','AdministrateurController@messageStore')->name('message.store');
    });


});
