<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMd1LookupResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md1_lookup_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lookup_id');
            $table->string('company_name', 200);
            $table->text('address')->nullable();
            $table->string('sector_id', 200)->nullable();
            $table->string('data_source', 90);
            $table->string('role', 90);
            $table->integer('master_data_id')->nullable();
            $table->string('master_data_company_name', 200)->nullable();
            $table->text('master_data_address')->nullable();
            $table->string('master_data_sector_id', 90)->nullable();
            $table->string('master_data_source', 90)->nullable();
            $table->string('status', 90);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('md1_lookup_results');
    }
}
