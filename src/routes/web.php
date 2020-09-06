<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/', function () {
    return redirect('/pokemon/inventory');
});

Route::get('/copyright', function () {
    return view('pages.copyright');
})->name('copyright');

Route::get('/settings', 'UserController@settings')->name('userSettings');
Route::post('/user/edit', 'UserController@edit')->name('userEdit');

Route::get('/pokemon/inventory', 'PokemonController@inventory')->name('inventory');
Route::get('/pokemon/catch-em-all', 'PokemonController@catchEmAll')->name('catchEmAll');
Route::post('/pokemon/catch', 'PokemonController@catch')->name('catchPokemon');
Route::post('/pokemon/release', 'PokemonController@release')->name('releasePokemon');


