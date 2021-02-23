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
            $table->text('products');
            $table->double('cart_total');
            $table->integer('delivery_method');
            $table->double('delivery_price');
            $table->integer('payment_method');
            $table->integer('user_id');
            $table->text('name');
            $table->text('phone');
            $table->text('email');
            $table->text('street');
            $table->text('building');
            $table->text('flat');
            $table->text('entrance');
            $table->text('floor');
            $table->text('code');
            $table->text('comment');
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
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
