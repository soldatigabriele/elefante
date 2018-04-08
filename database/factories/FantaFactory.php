<?php

use App\Logo;
use App\Country;
use App\Flavour;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Fanta::class, function (Faker $faker) {
    return [
	'year' => random_int(2000, 2020),
	'country_id' => Country::inRandomOrder()->first(),
	'flavour_id' => Flavour::inRandomOrder()->first(),
	'logo_id' => Logo::inRandomOrder()->first(),
    ];
});
