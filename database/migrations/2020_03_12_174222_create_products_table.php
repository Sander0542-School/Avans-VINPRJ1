<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->integer('id', true);
            $table->string('name');
            $table->integer('ordercode');
            $table->decimal('price', 7);
            $table->text('short_description');
            $table->text('long_description');
            $table->string('active_substances');
            $table->string('location', 11);
            $table->integer('stock');
            $table->integer('minimum_stock');
            $table->integer('order_quantity');
            $table->decimal('packaging_length', 5);
            $table->decimal('packaging_width', 5);
            $table->decimal('packaging_height', 5);
            $table->integer('consumer_packages');
            $table->string('packaging_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
