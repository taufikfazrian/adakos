<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKosansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kosans', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('city');
            $table->string('country');
            $table->float('price');
            $table->string('type_kosan');
            $table->string('address');
            $table->string('phone');
            $table->string('map_url');
            $table->float('number_of_bedrooms');
            $table->float('number_of_bathrooms');
            $table->float('number_of_cupboards');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kosans');
    }
}
