<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('reg_no');
            $table->integer('usertype_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->foreign('usertype_id')->references('id')->on('usertypes');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('start_date');
            $table->string('position');
            $table->string('nic');
            $table->string('gender');
            $table->string('date_of_birth');
            $table->string('address');
            $table->string('telephone')->nullable();
            $table->string('mobile');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('emp_tax');
            $table->string('remarks');
            $table->string('status'); 
            $table->integer('bank_id');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
