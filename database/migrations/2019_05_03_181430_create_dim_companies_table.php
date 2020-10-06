<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDimCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dim_companies', function (Blueprint $table) {
            $table->increments('id_company');
            $table->unsignedInteger('id_app');
            $table->integer('id_getData');
            $table->string('company_name', 200);
            $table->text('address');
            $table->string('sector_id', 90)->nullable();
            $table->string('role', 90);

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dim_companies');
    }
}
