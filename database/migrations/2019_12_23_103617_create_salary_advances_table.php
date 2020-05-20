<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryAdvancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_advances', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->string('amount');
            $table->integer('months');
            $table->string('perpose');
            $table->integer('status')->comment = '0 - pending , 1 -dpi head approved / reject 11, 2 - Admin approved / 22 - reject , super admin approved 3 / reject -33 , final approved 4 / pending 44' ;
            $table->integer('diphead_id')->unsigned();
            $table->string('diphead_date');
            $table->integer('admin_id_st1')->unsigned();
            $table->string('admin_date_st1');
            $table->integer('supperadmin_id')->unsigned();
            $table->string('supperadmin_date');
            $table->integer('admin_id_st2')->unsigned();
            $table->string('admin_date_st2');
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
        Schema::dropIfExists('salary_advances');
    }
}
