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
                'id' => 8,
                'nom' => 'STANLEY LEADS ROUND NECK TEE-SHIRT',
                'reference' => 'STTM528',
                'sexe' => 'Homme',
                'description' => 'Set-in sleeve
1x1 rib at neck collar
Inside back neck tape in self fabric
Sleeve hem and bottom hem with narrow double topstitch
SINGLE JERSEY
100% ORGANIC RING-SPUN COMBED COTTON
FABRIC WASHED',
                'imageName' => '1538663836.jpg',
                'color1' => '8',
                'color1_coeur_imageName' => '15386638361.jpg',
                'color1_FAV_imageName' => '15386638362.jpg',
                'color1_FAR_imageName' => '15386638363.jpg',
                'color1_FAV' => 1,
                'color1_FAR' => 1,
                'color1_coeur' => 1,
                'color2' => '9',
                'color2_coeur_imageName' => '15386638364.jpg',
                'color2_FAV_imageName' => '15386638365.jpg',
                'color2_FAR_imageName' => '15386638366.jpg',
                'color2_FAV' => 1,
                'color2_FAR' => 1,
                'color2_coeur' => 1,
                'color3' => NULL,
                'color3_coeur_imageName' => '15386638367.jpg',
                'color3_FAV_imageName' => '15386638368.jpg',
                'color3_FAR_imageName' => '15386638369.jpg',
                'color3_FAV' => 1,
                'color3_FAR' => 1,
                'color3_coeur' => 1,
                'created_at' => '2018-10-04 14:37:16',
                'updated_at' => '2018-10-04 14:37:16',
            ),
            1 => 
            array (
                'id' => 9,
                'nom' => 'POCKET ROUND NECK TEE-SHIRT',
                'reference' => 'ERDF457',
                'sexe' => 'Femme',
                'description' => 'Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam. Integer quis metus vitae elit',
                'imageName' => '1538750393.jpg',
                'color1' => '11',
                'color1_coeur_imageName' => NULL,
                'color1_FAV_imageName' => NULL,
                'color1_FAR_imageName' => NULL,
                'color1_FAV' => 1,
                'color1_FAR' => 0,
                'color1_coeur' => 1,
                'color2' => NULL,
                'color2_coeur_imageName' => NULL,
                'color2_FAV_imageName' => NULL,
                'color2_FAR_imageName' => NULL,
                'color2_FAV' => 0,
                'color2_FAR' => 0,
                'color2_coeur' => 0,
                'color3' => NULL,
                'color3_coeur_imageName' => NULL,
                'color3_FAV_imageName' => NULL,
                'color3_FAR_imageName' => NULL,
                'color3_FAV' => 0,
                'color3_FAR' => 0,
                'color3_coeur' => 0,
                'created_at' => '2018-10-05 14:39:53',
                'updated_at' => '2018-10-05 14:39:53',
            ),
            2 => 
            array (
                'id' => 10,
                'nom' => 'ROUND NECK TEE-SHIRT WITH DENIM FRONT PANEL',
                'reference' => 'STTM324',
                'sexe' => 'Femme',
                'description' => 'Set-in sleeve
1x1 rib at neck collar 
Inside back neck tape in self fabric
Front body in contrast denim fabric
Sleeve hem and bottom hem with narrow double topstitch
SINGLE JERSEY, WOVEN
100% ORGANIC RING-SPUN COMBED COTTON
FABRIC WASHED, GARMENT DYED',
                'imageName' => NULL,
                'color1' => '9',
                'color1_coeur_imageName' => '15389003601.jpg',
                'color1_FAV_imageName' => '15389003602.jpg',
                'color1_FAR_imageName' => '15389003603.jpg',
                'color1_FAV' => 1,
                'color1_FAR' => 1,
                'color1_coeur' => 1,
                'color2' => '7',
                'color2_coeur_imageName' => '15389003604.jpg',
                'color2_FAV_imageName' => '15389003605.jpg',
                'color2_FAR_imageName' => NULL,
                'color2_FAV' => 1,
                'color2_FAR' => 0,
                'color2_coeur' => 1,
                'color3' => NULL,
                'color3_coeur_imageName' => NULL,
                'color3_FAV_imageName' => NULL,
                'color3_FAR_imageName' => NULL,
                'color3_FAV' => 0,
                'color3_FAR' => 0,
                'color3_coeur' => 0,
                'created_at' => '2018-10-07 08:19:20',
                'updated_at' => '2018-10-07 08:19:20',
            ),
        ));
        
        
    }
}