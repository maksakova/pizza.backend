<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_product_variants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('menu_product_id');
            $table->integer('menu_variant_id');
            $table->float('price')->nullable();
            $table->string('weight')->nullable();
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
        Schema::dropIfExists('menu_product_variants');
    }
}
