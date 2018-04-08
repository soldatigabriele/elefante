<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Sugar free',
                'created_at' => '2018-04-08 19:58:21',
                'updated_at' => '2018-04-08 19:58:21',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Low sugar',
                'created_at' => '2018-04-08 19:58:21',
                'updated_at' => '2018-04-08 19:58:21',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Uden',
                'created_at' => '2018-04-08 19:58:21',
                'updated_at' => '2018-04-08 19:58:21',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Med',
                'created_at' => '2018-04-08 19:58:21',
                'updated_at' => '2018-04-08 19:58:21',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Zero',
                'created_at' => '2018-04-08 19:58:21',
                'updated_at' => '2018-04-08 19:58:21',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Lite',
                'created_at' => '2018-04-08 19:58:21',
                'updated_at' => '2018-04-08 19:58:21',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Senza zuccheri',
                'created_at' => '2018-04-08 19:58:21',
                'updated_at' => '2018-04-08 19:58:21',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Amara',
                'created_at' => '2018-04-08 19:58:21',
                'updated_at' => '2018-04-08 19:58:21',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Nuova ricetta',
                'created_at' => '2018-04-08 19:58:21',
                'updated_at' => '2018-04-08 19:58:21',
            ),
        ));
        
        
    }
}