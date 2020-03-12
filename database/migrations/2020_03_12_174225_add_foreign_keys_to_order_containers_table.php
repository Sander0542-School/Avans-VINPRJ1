<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOrderContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_containers', function (Blueprint $table) {
            $table->foreign('order_id', 'order_containers_ibfk_1')->references('id')->on('orders')->onUpdate('RESTRICT')
                ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_containers', function (Blueprint $table) {
            $table->dropForeign('order_containers_ibfk_1');
        });
    }
}
