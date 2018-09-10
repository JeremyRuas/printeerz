<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Tshirt col rond femme',
                'reference' => 'ERYH458UI',
                'sexe' => 'homme',
                'commentaires' => NULL,
                'created_at' => '2018-09-08 11:21:23',
                'updated_at' => '2018-09-08 11:21:23',
            ),
            1 => 
            array (
                'id' => 4,
                'nom' => 'tshirt col rond femme de merde',
                'reference' => 'ERT78HJ',
                'sexe' => 'homme',
                'commentaires' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, aperiam. Adipisci veniam laudantium nesciunt sed saepe qui impedit porro, tempora blanditiis soluta itaque sunt quam vitae minima corporis modi possimus!
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, aperiam. Adipisci veniam laudantium nesciunt sed saepe qui impedit porro, tempora blanditiis soluta itaque sunt quam vitae minima corporis modi possimus!
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, aperiam. Adipisci veniam laudantium nesciunt sed saepe qui impedit porro, tempora blanditiis soluta itaque sunt quam vitae minima corporis modi possimus!',
                'created_at' => '2018-09-08 12:52:15',
                'updated_at' => '2018-09-08 12:52:15',
            ),
        ));
        
        
    }
}