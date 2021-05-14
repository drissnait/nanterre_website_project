<?php
use App\Http\Controllers\Controller;
use App\Models\Groupe;
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


Route::get('/', 'Controller@index')->name('home')->middleware('auth');

Route::get('/export', function(){
  $groupes=Groupe::getGroupes();
  // info("Hello driss");
  // info("group".$groupes);
  return view('export')->with(compact("groupes"));
});

Route::post('/export', 'IndividuController@export')->name('export');
Route::post('/exportGroupe', 'GroupeController@exportGroupe')->name('exportGroupe');
Route::post('/exportGroupeAll', 'GroupeController@exportGroupeAllData')->name('exportGroupeAll');
Route::post('/importSave', 'IndividuController@importFromExcel');
Route::post('/import', 'IndividuController@importFromExcel')->name('import');

Route::get('/import', 'IndividuController@import');

Route::resource('individu', 'IndividuController');
Route::get('404/individu', 'IndividuController@individu_404');

Route::resource('composante', 'ComposanteController');
Route::get('404/composante', 'ComposanteController@composante_404');

Route::get('formation', 'FormationController@index');
Route::get('formation/create', 'FormationController@create');
Route::post('formation', 'FormationController@store');
Route::get('formation/{formation}/{vet}', 'FormationController@show');
Route::get('formation/{formation}/{vet}/edit', 'FormationController@edit');
Route::put('formation/{formation}/{vet}', 'FormationController@update');
Route::delete('formation/{formation}/{vet}', 'FormationController@destroy');

Route::get('salle', 'SalleController@index');
Route::get('salle/create', 'SalleController@create');
Route::post('salle', 'SalleController@store');
//Route::get('salle/{formation}/{vet}', 'FormationController@show');
Route::get('salle/edit', 'SalleController@edit');


Route::get('404/formation', 'FormationController@formation_404');

Route::resource('groupe', 'GroupeController');
Route::post('individu_groupe', 'IndividuGroupeController@store');
Route::delete('individu_groupe/{id_individu}/{id_groupe}', 'IndividuGroupeController@destroy');

Route::resource('seance', 'SeanceController');

Route::get('planning', 'PlanningController@index');
Route::post('api/calendar/groupe/', 'PlanningController@groupePlanningJSON');
Route::post('api/calendar/enseignant/', 'PlanningController@enseignantPlanningJSON');

Auth::routes(['register' => false]);
