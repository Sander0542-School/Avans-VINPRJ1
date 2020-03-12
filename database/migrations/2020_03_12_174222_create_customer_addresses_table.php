<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('customer_id')->index('customer_id');
            $table->string('street');
            $table->string('number', 11);
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zipcode', 11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_addresses');
    }
}
