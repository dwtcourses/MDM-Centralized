<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsertMasterDataHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insert_master_data_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 200);
            $table->text('address');
            $table->string('sector_id', 90)->nullable();
            $table->string('role', 90);
            $table->string('source', 90);
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
        Schema::dropIfExists('insert_master_data_histories');
    }
}
