<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettlementItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlement_items', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('settlement_id')->unsigned();
            $table->foreign('settlement_id')->references('id')->on('settlements');
            $table->string('invoice_num');
            $table->string('dipcription');
            $table->string('amount');
            $table->integer('status');
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
        Schema::dropIfExists('settlement_items');
    }
}
