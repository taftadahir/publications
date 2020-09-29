<?php

use App\Equipe;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->middleware('auth')->name('dashboard');

Route::post('/search/results', 'SearchController@getResult')->name('search-route');

// Etablissements
Route::get('etablissements', "EtablissementController@index")->name('etablissements.index');
Route::get('etablissements/create', "EtablissementController@create")->middleware('auth')->name('etablissements.create');
Route::get('etablissements/{etablissement}', "EtablissementController@show")->name('etablissements.show');
Route::middleware('auth')->post('etablissements/store', "EtablissementController@store")->name('etablissements.store');
Route::middleware('auth')->get('etablissements/{etablissement}/edit', "EtablissementController@edit")->name('etablissements.edit');
Route::middleware('auth')->put('etablissements/{etablissement}', "EtablissementController@update")->name('etablissements.update');
Route::middleware('auth')->delete('etablissements/{etablissement}', "EtablissementController@destroy")->name('etablissements.destroy');
Route::middleware('auth')->get('etablissements/{etablissement}/restore', "EtablissementController@restore")->name('etablissements.restore');

// Auteurs
Route::get('auteurs', "AuteurController@index")->name('auteurs.index');
Route::get('auteurs/create', "AuteurController@create")->middleware('auth')->name('auteurs.create');
Route::get('auteurs/{auteur}', "AuteurController@show")->name('auteurs.show');
Route::middleware('auth')->post('auteurs/store', "AuteurController@store")->name('auteurs.store');
Route::middleware('auth')->get('auteurs/{auteur}/edit', "AuteurController@edit")->name('auteurs.edit');
Route::middleware('auth')->put('auteurs/{auteur}', "AuteurController@update")->name('auteurs.update');
Route::middleware('auth')->delete('auteurs/{auteur}', "AuteurController@destroy")->name('auteurs.destroy');
Route::middleware('auth')->get('auteurs/{auteur}/restore', "AuteurController@restore")->name('auteurs.restore');

// articles
Route::get('articles', "ArticleController@index")->name('articles.index');
Route::get('articles/create', "ArticleController@create")->middleware('auth')->name('articles.create');
Route::get('articles/{article}', "ArticleController@show")->name('articles.show');
Route::middleware('auth')->post('articles/store', "ArticleController@store")->name('articles.store');
Route::middleware('auth')->post('articles/store/csv/file', "ArticleController@storeCsv")->name('articles.store_csv');
Route::middleware('auth')->get('articles/{article}/edit', "ArticleController@edit")->name('articles.edit');
Route::middleware('auth')->put('articles/{article}', "ArticleController@update")->name('articles.update');
Route::middleware('auth')->delete('articles/{article}', "ArticleController@destroy")->name('articles.destroy');
Route::middleware('auth')->get('articles/{article}/restore', "ArticleController@restore")->name('articles.restore');

// equipes
Route::get('equipes', "EquipeController@index")->name('equipes.index');
Route::get('equipes/create', "EquipeController@create")->middleware('auth')->name('equipes.create');
Route::get('equipes/{equipe}', "EquipeController@show")->name('equipes.show');
Route::middleware('auth')->post('equipes/store', "EquipeController@store")->name('equipes.store');
Route::middleware('auth')->get('equipes/{equipe}/edit', "EquipeController@edit")->name('equipes.edit');
Route::middleware('auth')->put('equipes/{equipe}', "EquipeController@update")->name('equipes.update');
Route::middleware('auth')->delete('equipes/{equipe}', "EquipeController@destroy")->name('equipes.destroy');
Route::middleware('auth')->get('equipes/{equipe}/restore', "EquipeController@restore")->name('equipes.restore');


// laboratoires
Route::get('laboratoires', "LaboratoireController@index")->name('laboratoires.index');
Route::get('laboratoires/create', "LaboratoireController@create")->middleware('auth')->name('laboratoires.create');
Route::get('laboratoires/{laboratoire}', "LaboratoireController@show")->name('laboratoires.show');
Route::middleware('auth')->post('laboratoires/store', "LaboratoireController@store")->name('laboratoires.store');
Route::middleware('auth')->get('laboratoires/{laboratoire}/edit', "LaboratoireController@edit")->name('laboratoires.edit');
Route::middleware('auth')->put('laboratoires/{laboratoire}', "LaboratoireController@update")->name('laboratoires.update');
Route::middleware('auth')->delete('laboratoires/{laboratoire}', "LaboratoireController@destroy")->name('laboratoires.destroy');
Route::middleware('auth')->get('laboratoires/{laboratoire}/restore', "LaboratoireController@restore")->name('laboratoires.restore');


Route::get('user', function ()
{
    $equipe = Equipe::where('id', 1)->first();
    return $equipe->responsable_labo;
})->middleware('auth');
