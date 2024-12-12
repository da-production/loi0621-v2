<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'middleware'    => ['auth'],
    'prefix'        => 'employeur',
    'as'            => 'employeur.'
], function () {
    Route::get('inscription', 'EmployeurController@inscription')->name('inscription');
    Route::post('inscription', 'EmployeurController@store')->name('inscription.store');

    Route::group([
        'middleware'    => ['profile']
    ], function(){
        Route::get('/profile', 'EmployeurController@profile')->name('profile');
        Route::post('/profile/update','EmployeurController@updateProfile')->name('profile.update');
        Route::post('/profile/update/employeur','EmployeurController@updateEmployeur')->name('profile.update.employeur');
        
        // subvention
        Route::get('/subvention/inscription', 'SubventionController@inscription')->name('subvention.inscription');
        Route::post('/subvention/inscription', 'SubventionController@store')->name('subvention.inscription.store');
    
        // formation
        Route::get('/formation/inscription', 'FormationController@inscription')->name('formation.inscription');
        Route::post('/formation/inscription', 'FormationController@store')->name('formation.inscription.store');
    
        // demande
        Route::post('/profile/nouvelle/demande','EmployeurController@storeNewDemande')->name('demande.store');
    });

    Route::get('/test','EmployeurController@test')->name('test');

});
Route::post('/broadcast/chat','TicketController@Chat')->name('chat');
