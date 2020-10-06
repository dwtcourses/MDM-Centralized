<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDimLookupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dim_lookups', function (Blueprint $table) {
            $table->integer('id_lookup')->unsigned();
            $table->integer('id_company')->unsigned();
            $table->primary(['id_lookup', 'id_company']);

            $table->string('status',40);

            $table->foreign('id_company')->references('id_company')->on('dim_companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dim_lookups');
    }
}
