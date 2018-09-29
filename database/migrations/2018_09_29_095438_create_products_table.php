<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
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
            $table->string('brand_name')->nullable();
            $table->string('generic_name')->nullable();
            $table->string('category')->nullable();
            $table->string('receive_date')->nullable();
            $table->string('exp_date')->nullable();
            $table->double('orginal_price')->nullable();
            $table->double('sell_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('quantity_left')->nullable();
            $table->double('total')->nullable();
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
        Schema::dropIfExists('products');
    }
}
