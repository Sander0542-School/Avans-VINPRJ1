<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRobotQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('robot_queue', function (Blueprint $table) {
            $table->integer('robot_id');
            $table->integer('order_product_id')->index('order_product_id');
            $table->primary(['robot_id', 'order_product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('robot_queue');
    }
}
