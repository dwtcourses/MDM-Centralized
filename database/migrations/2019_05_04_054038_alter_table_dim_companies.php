<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableDimCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('dim_companies', function (Blueprint $table) {
            $table->text('address')->nullable()->change();
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('id_app')->references('id_app')->on('dim_applications');
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
