<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRobotQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('robot_queue', function (Blueprint $table) {
            $table->foreign('robot_id', 'robot_queue_ibfk_1')->references('id')->on('robots')->onUpdate('RESTRICT')
                ->onDelete('RESTRICT');
            $table->foreign('order_product_id', 'robot_queue_ibfk_2')->references('id')->on('order_products')
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
        Schema::table('robot_queue', function (Blueprint $table) {
            $table->dropForeign('robot_queue_ibfk_1');
            $table->dropForeign('robot_queue_ibfk_2');
        });
    }
}
