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
            $table->longText('products');
            $table->float('cart_total')->default(0);
            $table->integer('delivery_method')->default(1);
            $table->float('delivery_price')->default(0);
            $table->integer('payment_method')->default(1);
            $table->float('cashback')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('name');
            $table->text('phone');
            $table->text('email')->nullable();
            $table->text('street')->nullable();
            $table->text('building')->nullable();
            $table->text('flat')->nullable();
            $table->text('entrance')->nullable();
            $table->text('floor')->nullable();
            $table->text('code')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('callback');
            $table->integer('status_id');
            $table->integer('unique')->nullable();
            $table->integer('payment_status')->nullable();
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
