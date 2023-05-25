<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->char('FoodID', 5)->primary();
            $table->char('FoodTypeID')->references('FoodTypeID')->on('food_types');
            $table->string('FoodName', 50);
            $table->integer('FoodPrice');
            $table->text('FoodImage');
            $table->text('FoodBriefDescription');
            $table->text('FoodFullDescription');
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
        Schema::dropIfExists('foods');
    }
};
