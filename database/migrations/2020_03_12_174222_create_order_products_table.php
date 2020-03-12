<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('order_id');
            $table->integer('product_id')->index('product_id');
            $table->decimal('price', 7);
            $table->integer('quantity');
            $table->unique(['order_id', 'product_id'], 'unique_order_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_products');
    }
}
