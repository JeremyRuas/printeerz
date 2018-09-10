<?php

use Illuminate\Database\Seeder;

class CouleursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('couleurs')->delete();
        
        \DB::table('couleurs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Bleu',
                'created_at' => '2018-09-08 11:19:05',
                'updated_at' => '2018-09-08 11:19:05',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'Blanc',
                'created_at' => '2018-09-08 11:19:10',
                'updated_at' => '2018-09-08 11:19:10',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'Noir',
                'created_at' => '2018-09-08 11:19:17',
                'updated_at' => '2018-09-08 11:19:17',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'Rouge',
                'created_at' => '2018-09-08 11:19:25',
                'updated_at' => '2018-09-08 11:19:25',
            ),
            4 => 
            array (
                'id' => 5,
                'nom' => 'Rose',
                'created_at' => '2018-09-08 11:19:31',
                'updated_at' => '2018-09-08 11:19:31',
            ),
            5 => 
            array (
                'id' => 6,
                'nom' => 'Orange',
                'created_at' => '2018-09-08 11:19:37',
                'updated_at' => '2018-09-08 11:19:37',
            ),
            6 => 
            array (
                'id' => 7,
                'nom' => 'Vert',
                'created_at' => '2018-09-08 11:19:54',
                'updated_at' => '2018-09-08 11:19:54',
            ),
        ));
        
        
    }
}