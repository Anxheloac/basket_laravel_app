<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('order_car', function(Blueprint $table){
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('car_id');
            $table->integer('quantity');
        });

        Schema::table('order_car', function(Blueprint $table){
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('car_id')->references('id')->on('cars');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_car');
        Schema::dropIfExists('orders');
    }
}
