<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmes', function (Blueprint $table) {
            $table->id();

            $table->text('FA_GROUPNAME')->nullable();
            $table->string('FA_TITLE')->nullable();
            $table->string('FA_NAME')->nullable();
            $table->string('FA_HOUSENUMBER')->nullable();
            $table->string('FA_MOO')->nullable();
            $table->string('FA_SUB_DISTRICT')->nullable();
            $table->string('FA_DISTRICT')->nullable();
            $table->string('FA_PROVINCE')->nullable();
            $table->string('FA_PHONE')->nullable();
            $table->string('FA_LAT')->nullable();
            $table->string('FA_LONG')->nullable();
            $table->string('FA_FARM')->nullable();
            $table->string('FA_FARM_WORK')->nullable();
            $table->string('FA_METER')->nullable();
            $table->text('FA_DETAIL')->nullable();
            $table->text('FA_FLOWER')->nullable();
            $table->text('FA_CUSTOMER_GROUP')->nullable();
            $table->text('FA_PROBLEM_PLANT')->nullable();
            $table->text('FA_SEND')->nullable();
            // $table->text('FA_SEND_OTHER')->nullable();
            $table->text('FA_SELL')->nullable();
            // $table->text('FA_CONDITION_SELL')->nullable();
            // $table->text('FA_CONDITION_SELL_OTHER')->nullable();
            // $table->text('FA_CUSTOMER_PAYS')->nullable();
            // $table->text('FA_CUSTOMER_PAYS_OTHER')->nullable();
            // $table->text('FA_PROMOTION')->nullable();
            // $table->text('FA_PROMOTION_OTHER')->nullable();
            $table->text('FA_LABOR')->nullable();
            // $table->text('FA_VOLUME')->nullable();
            $table->text('FA_REMAINING')->nullable();
            $table->text('FA_REMAINING_CAUSE')->nullable();
            // $table->text('FA_REMAINING_CAUSE_OTHER')->nullable();
            $table->text('FA_SET_PRICE')->nullable();
            $table->text('FA_PROBLEM')->nullable();

            $table->text('file')->nullable();
            $table->text('file_multiple')->nullable();
            $table->text('_token')->nullable();
            
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
        Schema::dropIfExists('farmes');
    }
}
