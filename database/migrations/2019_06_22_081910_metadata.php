<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Metadata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadata', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('master_data_id');
            $table->integer('data_id');
            $table->string('company_name');
            $table->string('address');
            $table->string('data_source');
            $table->dateTime('synchronized_at')->useCurrent();
            $table->foreign('master_data_id')->references('id')->on('master_data_companies');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
