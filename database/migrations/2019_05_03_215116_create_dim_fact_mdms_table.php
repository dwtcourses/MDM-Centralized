<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDimFactMdmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dim_fact_mdms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_lookup');
            $table->unsignedInteger('id_time');
            $table->unsignedInteger('id_app');
            $table->foreign('id_lookup')->references('id_lookup')->on('dim_lookups');
            $table->foreign('id_time')->references('id_time')->on('dim_times');
            $table->foreign('id_app')->references('id_app')->on('dim_applications');
            $table->integer('total_notMatch');
            $table->integer('total_match');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dim_fact_mdms');
    }
}
