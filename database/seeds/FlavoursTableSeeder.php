<?php

use Illuminate\Database\Seeder;

class FlavoursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('flavours')->delete();
        
        \DB::table('flavours')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Orange',
                'created_at' => '2018-04-08 19:34:14',
                'updated_at' => '2018-04-08 19:34:14',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Green apple',
                'created_at' => '2018-04-08 19:34:14',
                'updated_at' => '2018-04-08 19:34:14',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Strawberry',
                'created_at' => '2018-04-08 19:34:14',
                'updated_at' => '2018-04-08 19:34:14',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Pineapple',
                'created_at' => '2018-04-08 19:34:14',
                'updated_at' => '2018-04-08 19:34:14',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Mango',
                'created_at' => '2018-04-08 19:34:14',
                'updated_at' => '2018-04-08 19:34:14',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Lemon',
                'created_at' => '2018-04-08 19:34:14',
                'updated_at' => '2018-04-08 19:34:14',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Grape',
                'created_at' => '2018-04-08 19:34:14',
                'updated_at' => '2018-04-08 19:34:14',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Cantaloupe',
                'created_at' => '2018-04-08 19:34:14',
                'updated_at' => '2018-04-08 19:34:14',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Black currant',
                'created_at' => '2018-04-08 19:34:14',
                'updated_at' => '2018-04-08 19:34:14',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Raspberry',
                'created_at' => '2018-04-08 19:34:14',
                'updated_at' => '2018-04-08 19:34:14',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Blueberry',
                'created_at' => '2018-04-08 19:34:14',
                'updated_at' => '2018-04-08 19:34:14',
            ),
        ));
        
        
    }
}