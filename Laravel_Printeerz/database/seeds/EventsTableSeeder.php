<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('events')->delete();
        
        \DB::table('events')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'HellFest',
                'customer_id' => 2,
                'annonceur' => 'Red Dragon',
                'logoName' => '1537965075.jpg',
                'lieu' => 'PARIS',
                'date' => '2018-09-26 00:00:00',
                'type' => 'Festival',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed,',
                'created_at' => '2018-09-26 12:31:15',
                'updated_at' => '2018-09-26 12:31:15',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'VivaTech',
                'customer_id' => 1,
                'annonceur' => 'La Cantine du Numérique',
                'logoName' => '1537965115.jpg',
                'lieu' => 'COURBEVOIE',
                'date' => '2020-10-26 00:00:00',
                'type' => 'Salon',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed,',
                'created_at' => '2018-09-26 12:31:55',
                'updated_at' => '2018-09-26 12:31:55',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'LaHaie',
                'customer_id' => 4,
                'annonceur' => 'NATS',
                'logoName' => '1537965166.jpg',
                'lieu' => 'PARIS',
                'date' => '2019-12-30 00:00:00',
                'type' => 'Fennec',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed,',
                'created_at' => '2018-09-26 12:32:46',
                'updated_at' => '2018-09-26 12:32:46',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'Vert',
                'customer_id' => 4,
                'annonceur' => 'Vinci',
                'logoName' => '1537965213.jpg',
                'lieu' => 'ORVAULT',
                'date' => '2018-09-26 00:00:00',
                'type' => 'Chat',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed,',
                'created_at' => '2018-09-26 12:33:32',
                'updated_at' => '2018-09-26 12:33:33',
            ),
        ));
        
        
    }
}