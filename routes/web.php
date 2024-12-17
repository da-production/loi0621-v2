<?php

use App\Http\Controllers\Auth\ResetPawssordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('accueil');

Route::post("/emp/code/check","HomeController@EmployeurCode")->middleware('throttle:cnas-check-api')->name('employeur.code.check');
Route::post("/emp/code/check2","HomeController@EmployeurCode2")->middleware('auth')->name('employeur.code.check2');

Route::get('code',"Auth\LoginController@codeForm")->name('employeur.code.form');
Route::post('code',"Auth\LoginController@loginCode")->name('employeur.code.login');

Route::get('reset',[ResetPawssordController::class,'reset'])->name('employeur.reset');
Route::post('reset/send/email',[ResetPawssordController::class,'generateToken'])->name('employeur.sendemail');
Route::get('reset/new/password',[ResetPawssordController::class,'NewPassword'])->name('employeur.new.password');
Route::post('reset/new/password',[ResetPawssordController::class,'StoreNewPassword'])->name('employeur.store.new.password');

Auth::routes();
