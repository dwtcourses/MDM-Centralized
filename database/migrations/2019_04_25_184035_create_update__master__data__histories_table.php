<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdateMasterDataHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_master_data_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 200);
            $table->text('address');
            $table->string('sector_id', 90);
            $table->string('data_source', 90);
            $table->integer('master_data_id');
            $table->string('master_data_company_name', 200);
            $table->text('master_data_address');
            $table->string('master_data_sector_id', 90);
            $table->string('master_data_source', 90);
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
        Schema::dropIfExists('update_master_data_histories');
    }
}
