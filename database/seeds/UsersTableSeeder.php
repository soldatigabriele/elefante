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
                'password' => '$2y$10$Yfrof8s5DpJq/2fTfzPcDeJA.j4ielrHjDmLbYhyC.WW0R0dPJQkK',
                'remember_token' => NULL,
                'created_at' => '2018-03-05 20:15:54',
                'updated_at' => '2018-03-05 20:15:54',
            ),
        ));
        
        
    }
}