<?php

use Illuminate\Database\Seeder;

class ColoursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('colours')->delete();
        
        \DB::table('colours')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Red',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Orange',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Yellow',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Green',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Cyan',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Blue',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Indigo',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Violet',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Purple',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Magenta',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Pink',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Brown',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'White',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Gray',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Black',
                'created_at' => '2018-04-08 19:45:06',
                'updated_at' => '2018-04-08 19:45:06',
            ),
        ));
        
        
    }
}