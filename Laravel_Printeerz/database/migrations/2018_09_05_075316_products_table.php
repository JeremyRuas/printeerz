<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('reference');
            $table->enum('sexe', ['Femme', 'Homme'])->default('Homme');
            $table->text('description')->nullable();
            $table->string('imageName')->nullable();

            $table->string('color1')->nullable();
            $table->string('color1_coeur_imageName')->nullable();
            $table->string('color1_coeur_gabarit')->nullable();
            $table->string('color1_FAV_imageName')->nullable();
            $table->string('color1_FAV_gabarit')->nullable();
            $table->string('color1_FAR_imageName')->nullable();
            $table->string('color1_FAR_gabarit')->nullable();
            $table->boolean('color1_FAV')->default(0);
            $table->boolean('color1_FAR')->default(0);
            $table->boolean('color1_coeur')->default(0);

            $table->string('color2')->nullable();
            $table->string('color2_coeur_imageName')->nullable();
            $table->string('color2_coeur_gabarit')->nullable();
            $table->string('color2_FAV_imageName')->nullable();
            $table->string('color2_FAV_gabarit')->nullable();
            $table->string('color2_FAR_imageName')->nullable();
            $table->string('color2_FAR_gabarit')->nullable();
            $table->boolean('color2_FAV')->default(0);
            $table->boolean('color2_FAR')->default(0);
            $table->boolean('color2_coeur')->default(0);

            $table->string('color3')->nullable();
            $table->string('color3_coeur_imageName')->nullable();
            $table->string('color3_coeur_gabarit')->nullable();
            $table->string('color3_FAV_imageName')->nullable();
            $table->string('color3_FAV_gabarit')->nullable();
            $table->string('color3_FAR_imageName')->nullable();
            $table->string('color3_FAR_gabarit')->nullable();
            $table->boolean('color3_FAV')->default(0);
            $table->boolean('color3_FAR')->default(0);
            $table->boolean('color3_coeur')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::dropIfExists('products');
    // }
}