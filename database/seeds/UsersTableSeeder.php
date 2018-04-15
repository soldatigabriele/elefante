<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Gabriele',
                'email' => 'soldati.gabriele@gmail.com',
                'password' => bcrypt('191191'),
                'remember_token' => NULL,
                'created_at' => '2018-03-05 20:15:54',
                'updated_at' => '2018-03-05 20:15:54',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Cristina',
                'email' => 'cristina.bellese@icloud.com',
                'password' => bcrypt('192519'),
                'remember_token' => NULL,
                'created_at' => '2018-03-05 20:15:54',
                'updated_at' => '2018-03-05 20:15:54',
            ),
        ));


    }
}
