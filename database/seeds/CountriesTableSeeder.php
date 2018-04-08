<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Sweden',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Ireland',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Uk',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Austria',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Italy',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Belgium',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Latvia',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Bulgaria',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Lithuania',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Croatia',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Luxembourg',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Cyprus',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Malta',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Czech republic',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Netherlands',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Denmark',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Poland',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Estonia',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Portugal',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Finland',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Romania',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'France',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Slovakia',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Germany',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Slovenia',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Greece',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Spain',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Hungary',
                'created_at' => '2018-04-08 19:28:25',
                'updated_at' => '2018-04-08 19:28:25',
            ),
        ));
        
        
    }
}