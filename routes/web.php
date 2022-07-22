<?php

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
    return view('welcome');
});



Route::post('/registrazione','App\Http\Controllers\RegistrazioneController@registrazioneUtente');
Route::get("/registrazione/username/{username}", "App\Http\Controllers\RegistrazioneController@checkUser");
Route::get("/registrazione/email/{email}", "App\Http\Controllers\RegistrazioneController@checkEmail");
Route::get('/registrazione','App\Http\Controllers\RegistrazioneController@registrazione_csrf')->name("registrazione");

Route::get("/loginPage", "App\Http\Controllers\LoginController@checklog")->name("loginPage");
Route::get("/logout", "App\Http\Controllers\LoginController@logout")->name("logout");
Route::post("/loginPage", "App\Http\Controllers\LoginController@check");


Route::get("/homePage", "App\Http\Controllers\HomeController@index")->name("homePage");
Route::post("/homePage/inviopost/","App\Http\Controllers\SezPostController@inviopost")->name("inviopost");
Route::get("/homePage/song/{query}", "App\Http\Controllers\HomeController@song");
Route::get("/homePage/showpost/{n}","App\Http\Controllers\SezPostController@osservaPost");
Route::get("/homePage/eliminazione/{id}","App\Http\Controllers\SezPostController@eliminazione");