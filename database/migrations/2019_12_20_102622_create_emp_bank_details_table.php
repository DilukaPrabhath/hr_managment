<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_bank_details', function (Blueprint $table) {

            $table->Increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('bank_name');
            $table->string('branch');
            $table->string('account_name');
            $table->string('bsb')->nullable();
            $table->string('account_number');
            $table->string('status');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->softDeletes();
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
        Schema::dropIfExists('emp_bank_details');
    }
}
