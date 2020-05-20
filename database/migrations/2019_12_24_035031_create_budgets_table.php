<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->text('discription');
            $table->string('cost');
            $table->integer('status');
            $table->string('dep_head_date');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('user_date');
            $table->integer('head_id')->unsigned();
            $table->foreign('head_id')->references('id')->on('users');
            $table->string('adm_date');
            $table->integer('adm_id')->unsigned();
            $table->foreign('adm_id')->references('id')->on('users');
            $table->string('superadm_date');
            $table->integer('superadm_id')->unsigned();
            $table->foreign('superadm_id')->references('id')->on('users');
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
        Schema::dropIfExists('budgets');
    }
}
