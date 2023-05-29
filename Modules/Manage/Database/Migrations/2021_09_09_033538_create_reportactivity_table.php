<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportactivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportactivity', function (Blueprint $table) {
            $table->id('id_ac_report');

            $table->string('id_report')->nullable();
            $table->string('id_ac')->nullable();
            $table->string('re_ac_name')->nullable();
            $table->string('re_ac_approve')->nullable();
            $table->string('re_ac_withdraw')->nullable();
            $table->string('re_ac_target')->nullable();
            $table->string('re_ac_income')->nullable();
            $table->string('re_ac_quality')->nullable();
            $table->string('re_ac_problem')->nullable();
            $table->string('re_ac_note')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportactivity');
    }
}
