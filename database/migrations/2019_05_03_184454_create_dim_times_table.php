<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDimTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dim_times', function (Blueprint $table) {
            $table->increments('id_time');
            $table->timestamp('created_at')->useCurrent();
            $table->string('day',10);
            $table->char('date', 2);
            $table->string('month',10);
            $table->string('year',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dim_times');
    }
}
