<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSupplierContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplier_contacts', function (Blueprint $table) {
            $table->foreign('supplier_id', 'supplier_contacts_ibfk_1')->references('id')->on('suppliers')
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
        Schema::table('supplier_contacts', function (Blueprint $table) {
            $table->dropForeign('supplier_contacts_ibfk_1');
        });
    }
}
