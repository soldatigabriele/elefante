<?php

use App\Tag;
use App\Fanta;
use App\Colour;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
	    $this->call(LogosTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(FlavoursTableSeeder::class);
        $this->call(ColoursTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        
        factory('App\Fanta', 30)->create();

		$colours = Colour::all();
		// Populate the pivot table
		Fanta::all()->each(function ($fanta) use ($colours) { 
		    $fanta->colours()->attach(
		        $colours->random(rand(1, 3))->pluck('id')->toArray()
		    ); 
    	});
    	
		$tags = Tag::all();
		// Populate the pivot table
		Fanta::take(10)->get()->each(function ($fanta) use ($tags) { 
		    $fanta->tags()->attach(
		        $tags->random(rand(1, 3))->pluck('id')->toArray()
		    ); 
    	});
    }
}
