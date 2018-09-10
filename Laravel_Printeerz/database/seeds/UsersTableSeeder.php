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
                'prenom' => 'Ruas',
                'nom' => 'Jérémy',
                'role' => 'admin',
                'email' => 'ruas.jeremy@gmail.com',
                'password' => '$2y$10$R3RYGZsBN5gcExZupGnz8u3uAEx097qg4VcWDqXWQOwgTuDpS8O16',
                'activate' => 1,
                'imageName' => NULL,
                'remember_token' => NULL,
                'created_at' => '2018-09-07 16:38:13',
                'updated_at' => '2018-09-07 16:38:13',
            ),
        ));
        
        
    }
}