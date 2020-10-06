<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterDataCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_data_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 200);
            $table->text('address');
            $table->string('sector_id', 90)->nullable();
            $table->string('role', 90);
            $table->string('source', 90);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_data_companies');
    }
}
