<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('customer_id')->nullable();
            $table->string('annonceur');
            $table->string('logoName')->nullable();
            $table->string('lieu');
            $table->datetime('date');
            $table->string('type');
            $table->text('commentaires')->nullable();
            $table->timestamps();
        });

        Schema::create('customer_event', function(Blueprint $table){
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->index();
            $table->integer('event_id')->unsigned()->index();
            //$table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            // $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('events');
//     }
}
