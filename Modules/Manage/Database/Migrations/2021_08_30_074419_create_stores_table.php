<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();

            $table->text('S_NAME')->nullable();
            $table->string('S_OWNER_PREFIX')->nullable();
            $table->text('S_OWNER_NAME')->nullable();
            $table->string('S_PHONE')->nullable();
            $table->string('S_FACEBOOK')->nullable();
            $table->string('S_LINE')->nullable();
            $table->text('S_WEBSITE')->nullable();
            $table->string('S_NUMBER')->nullable();
            $table->string('S_VILLAGE')->nullable();
            $table->string('S_SUB_DISTRICT')->nullable();
            $table->string('S_DISTRICT')->nullable();
            $table->string('S_PROVINCE')->nullable();
            $table->string('S_LAT')->nullable();
            $table->string('S_LONG')->nullable();
            $table->text('S_DETAIL')->nullable();
            $table->text('S_FLOWER')->nullable();
            $table->text('S_FLOWER_OTHER')->nullable();
            $table->text('S_CUSTOMER_GROUP')->nullable();
            $table->text('S_CUSTOMER_GROUP_OTHER')->nullable();
            $table->text('S_SOURCE')->nullable();
            $table->text('S_LOCATION_AFFECT_SALE')->nullable();
            $table->text('S_COMPETE')->nullable();
            $table->text('S_SEND')->nullable();
            $table->text('S_SEND_OTHER')->nullable();
            $table->text('S_SELL')->nullable();
            $table->text('S_CONDITION_SELL')->nullable();
            $table->text('S_CONDITION_SELL_OTHER')->nullable();
            $table->text('S_CUSTOMER_PAYS')->nullable();
            $table->text('S_CUSTOMER_PAYS_OTHER')->nullable();
            $table->text('S_OTHER')->nullable();
            $table->text('S_PROMOTION')->nullable();
            $table->text('S_PROMOTION_OTHER')->nullable();
            $table->text('S_LABOR')->nullable();
            
            $table->text('S_VOLUME')->nullable();
            $table->text('S_REMAINING')->nullable();
            $table->text('S_REMAINING_CAUSE')->nullable();
            $table->text('S_REMAINING_CAUSE_OTHER')->nullable();
            $table->text('S_SET_PRICE')->nullable();
            $table->text('S_PROBLEM')->nullable();
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
        Schema::dropIfExists('stores');
    }
}
