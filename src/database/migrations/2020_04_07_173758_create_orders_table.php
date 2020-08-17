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
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->json('group');
            $table->integer('state_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->text('response_message')->nullable();
            $table->timestamp('period_from')->nullable();
            $table->timestamp('period_to')->nullable();
            $table->timestamps();

            $table->foreign('state_id')->references('id')->on('order_states');
            $table->foreign('type_id')->references('id')->on('order_types');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
