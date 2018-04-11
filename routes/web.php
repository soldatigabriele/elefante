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

Route::get('/', 'HomeController@index')->name('home');
Route::get('fanta', 'FantaController@index')->name('index-fanta');
Route::get('fanta/create', 'FantaController@create')->name('create-fanta')->middleware('auth');
Route::get('fanta/{fanta}', 'FantaController@show')->name('show-fanta');
Route::get('fanta/{fanta}/edit', 'FantaController@edit')->name('edit-fanta');
Route::put('fanta/{fanta}', 'FantaController@update')->name('update-fanta');
Route::post('fanta', 'FantaController@store')->name('fanta.store');
Route::post('fanta/find', 'FantaController@find')->name('find-fanta');

Route::get('fanta/{fanta}/preview/create', 'FantaController@createPreview')->name('preview.create');
Route::get('fanta/{fanta}/sides/create', 'FantaController@createSides')->name('sides.create');
Route::post('fanta/{fanta}/preview', 'FantaController@storePreview')->name('preview.store');
Route::post('fanta/{fanta}/sides', 'FantaController@storeteSides')->name('sides.store');

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