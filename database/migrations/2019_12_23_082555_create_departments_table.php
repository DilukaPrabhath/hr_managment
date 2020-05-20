<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('department');
            $table->string('status');
            $table->integer('dephead');
            $table->string('created_by');
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
        Schema::create('departments', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('department');
            $table->string('status');
            $table->integer('dephead');
            $table->string('created_by');
            $table->timestamps();
        });
    }
}
