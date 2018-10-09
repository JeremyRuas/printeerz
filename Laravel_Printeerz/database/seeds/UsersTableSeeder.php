<?php

use App\User;

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
                'password' => '$2y$10$qV.1POH.BPwYtiLfe4jIz.Gr3QACIOm3QD8ArFa6PU5TQluePqeVS',
                'activate' => 1,
                'imageName' => NULL,
                'remember_token' => NULL,
                'created_at' => '2018-09-26 12:22:02',
                'updated_at' => '2018-09-26 12:22:02',
            ),
        ));

        $faker = \Faker\Factory::create('fr_FR');
        $roles = array('admin', 'opérateur', 'technicien');
        $key = shuffle($roles);
        for ($i = 0; $i < 10; $i++) {
            $user = new User;
            $user->nom = $faker->lastName;
            $user->prenom = $faker->firstName;
            $user->role = rand(0, 1) ? 'admin' : 'opérateur';
            // $user->imageName = $faker->imageUrl($width = 640, $height = 480);
            $user->email = $faker->unique()->email;
            $user->password = bcrypt('adminadmin');
            $user->save();
        }

        for ($j = 0; $j < 4; $j++) {
            $user = new User;
            $user->nom = $faker->lastName;
            $user->prenom = $faker->firstName;
            $user->role = 'technicien';
            // $user->imageName = $faker->imageUrl($width = 640, $height = 480);
            $user->email = $faker->unique()->email;
            $user->password = bcrypt('adminadmin');
            $user->save();
        }
        
        // for ($j = 0; $j < 10; $j++) {
        //     $user = new User;
        //     $user->nom = $faker->lastName;
        //     $user->prenom = $faker->firstName;
        //     $user->role = reset($roles);
        //     // $user->imageName = $faker->imageUrl($width = 640, $height = 480);
        //     $user->email = $faker->unique()->email;
        //     $user->password = bcrypt('adminadmin');
        //     $user->save();
        // }
        
    }
}