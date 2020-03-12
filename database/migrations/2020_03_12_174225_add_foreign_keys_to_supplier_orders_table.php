<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSupplierOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplier_orders', function (Blueprint $table) {
            $table->foreign('product_id', 'supplier_orders_ibfk_1')->references('id')->on('products')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('supplier_id', 'supplier_orders_ibfk_2')->references('id')->on('suppliers')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supplier_orders', function (Blueprint $table) {
            $table->dropForeign('supplier_orders_ibfk_1');
            $table->dropForeign('supplier_orders_ibfk_2');
        });
    }
}
