<?php

use Illuminate\Database\Seeder;

class LogosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('logos')->delete();
        
        \DB::table('logos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Old Logo',
                'created_at' => '2018-04-08 19:58:21',
                'updated_at' => '2018-04-08 19:58:21',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Mid Logo',
                'created_at' => '2018-04-08 19:58:21',
                'updated_at' => '2018-04-08 19:58:21',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'New Logo',
                'created_at' => '2018-04-08 19:58:21',
                'updated_at' => '2018-04-08 19:58:21',
            )
        ));
    }
}