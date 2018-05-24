<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelMealIng extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('meal_ing')) {

            Schema::create('meal_ing', function (Blueprint $table) {

                $table->integer('meal_id')->unsigned()->nullable();
                $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
                $table->integer('ing_id')->unsigned()->nullable();
                $table->foreign('ing_id')->references('id')->on('ingredients')->onDelete('cascade');

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_ing');
    }
}
