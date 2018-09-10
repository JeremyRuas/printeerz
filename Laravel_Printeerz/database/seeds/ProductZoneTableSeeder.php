<?php

use Illuminate\Database\Seeder;

class ProductZoneTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_zone')->delete();
        
        \DB::table('product_zone')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 1,
                'zone_id' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 1,
                'zone_id' => 3,
            ),
            2 => 
            array (
                'id' => 8,
                'product_id' => 4,
                'zone_id' => 2,
            ),
            3 => 
            array (
                'id' => 9,
                'product_id' => 4,
                'zone_id' => 3,
            ),
        ));
        
        
    }
}