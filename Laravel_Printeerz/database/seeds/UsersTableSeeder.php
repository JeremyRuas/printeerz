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
                'prenom' => 'Jérémy',
                'nom' => 'Ruas',
                'role' => 'admin',
                'email' => 'ruas.jeremy@gmail.com',
                'password' => '$2y$10$kuU8HGxWLy4FYsOkL3Npy.WZyde.9O6Wxo0tqoNLfqdntFQjZBXpa',
                'activate' => 1,
                'imageName' => NULL,
                'remember_token' => 'VvKxmPWmeZXMn7zQEeDwvw0LhyWS7LuKAM5ADXzwJtRztF8tBLBpkp1SoPxy',
                'created_at' => '2018-09-12 12:24:01',
                'updated_at' => '2018-09-12 12:24:01',
            ),
        ));
        
        
    }
}