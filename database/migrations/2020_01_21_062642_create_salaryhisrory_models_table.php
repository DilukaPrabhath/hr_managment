<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryhisroryModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaryhisrory_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('requested_sal_advance');
            $table->string('approve_sal_advance');
            $table->integer('advase_id');
            $table->integer('user_id');
            $table->integer('admin_id');
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
        Schema::dropIfExists('salaryhisrory_models');
    }
}
