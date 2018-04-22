<?php

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


//TODO
// create factory to store fantas and update the relationships
// create tests in retrieveFantaTest and add a vue component to render retrieved fantas

Route::get('/', function(){
	return view('homepage');
})->name('home');

Route::get('fanta', 'FantaController@find')->name('fanta.find');
Route::post('fanta', 'FantaController@store')->name('fanta.store');
Route::get('fanta/filter', 'FantaController@filter')->name('fanta.filter');
Route::get('fanta/create', 'FantaController@create')->name('fanta.create')->middleware('auth');
Route::get('fanta/stats', 'StatsController@stats')->name('fanta.stats');
Route::get('fanta/{fanta}', 'FantaController@show')->name('fanta.show');
Route::get('fanta/{fanta}/edit', 'FantaController@edit')->name('fanta.edit')->middleware('auth');;
Route::put('fanta/{fanta}', 'FantaController@update')->name('fanta.update');

Route::get('fanta/{fanta}/images/create', 'ImagesController@create')->name('images.create');

Route::get('fanta/{fanta}/sides/create', 'ImagesController@createSides')->name('sides.create');
Route::post('fanta/{fanta}/preview', 'ImagesController@storePreview')->name('preview.store');
Route::get('fanta/{fanta}/preview/delete', 'ImagesController@destroyPreview')->name('preview.destroy');
Route::get('fanta/{fanta}/sides/delete', 'ImagesController@destroySides')->name('sides.destroy');
Route::post('fanta/{fanta}/sides', 'ImagesController@storeSides')->name('sides.store');
Route::get('fanta/{fanta}/side/{image}/delete', 'ImagesController@destroySide')->name('side.destroy');
Route::get('fanta/{fanta}/images/delete', 'ImagesController@destroyImages')->name('images.destroy');
Route::get('fanta/{fanta}/preview/create', 'FantaController@createPreview')->name('preview.create');
Route::get('fanta/{fanta}/sides/create', 'FantaController@createSides')->name('sides.create');
Route::post('fanta/{fanta}/preview', 'ImagesController@storePreview')->name('preview.store');
Route::post('fanta/{fanta}/sides', 'ImagesController@storeSides')->name('sides.store');

// Route::post('fanta/{fanta}/images', 'FantaController@storeImages')->name('store-images-fanta');

Route::get('upload', function(){return view('fanta.images.preview-create')->with('fanta', \App\Fanta::first()); });



Auth::routes();

// Route::resource('gab', 'FantaController');

Route::get('seed', function(){
	// $fantas = \App\Fanta::take(10)->get();
	// dump($fantas);

	//$tags = ["Sugar Free", "Low Sugar", "Uden", "Med", "Zero", "Lite", "Senza Zuccheri", "Amara", "Nuova Ricetta"]; 
	// $colours = ["Red", "Orange", "Yellow", "Green", "Cyan", "Blue", "Indigo", "Violet", "Purple", "Magenta", "Pink", "Brown", "White", "Gray", "Black"];

	// $flavours = ["Orange", "Green Apple", "Strawberry", "Pineapple", "Mango", "Lemon", "Grape", "Cantaloupe", "Black Currant", "Raspberry", "Blueberry"];
	// $countries = ["Apple", "Lemon", "Blue", "White", "Orange", "Green", "", "Luxembourg", "Cyprus", "Malta", "Czech Republic", "Netherlands", "Denmark", "Poland", "Estonia", "Portugal", "Finland", "Romania", "France", "Slovakia", "Germany", "Slovenia", "Greece", "Spain", "Hungary", "Sweden", "Ireland",	"UK"];
	// foreach($colours as $colour){
	// 	$c = new \App\Colour;
	// 	$c->name = $colour;
	// 	$c->save();
	// 	echo($c->name);
	// 	echo ' ';
	// }
	// return \App\Colour::all();
});