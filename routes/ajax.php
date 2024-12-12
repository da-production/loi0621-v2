<?php

use Illuminate\Support\Facades\Route;

Route::get('code_employeur', 'Employeur\AjaxController@ajax')->name('employeur.ajax');

Route::group([
    'namespace'     => 'Employeur',
    'as'            => 'employeur.',
    'prefix'        => 'api/ajax/employeur/',
],  function(){
});