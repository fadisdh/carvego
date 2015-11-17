<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();

            $table->integer('car_id')->unsigned()->nullable();
            $table->foreign('car_id')
                  ->references('id')->on('cars')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
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
        Schema::drop('featured');
    }
}
