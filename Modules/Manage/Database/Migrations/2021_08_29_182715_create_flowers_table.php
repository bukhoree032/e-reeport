<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flowers', function (Blueprint $table) {
            $table->id();

            $table->text('F_NAME')->nullable();
            $table->string('F_COMMON_NAME')->nullable();
            $table->text('F_SCIENTIFIC_NAME')->nullable();
            $table->text('F_OTHER_NAME')->nullable();
            $table->string('F_TYPE')->nullable();
            $table->text('F_OVERALL_APPEARANCE')->nullable();
            $table->text('F_NATURE_TRUNK')->nullable();
            $table->text('F_NATURE_LEAF')->nullable();
            $table->text('F_NATURE_FLOWER')->nullable();
            $table->text('F_GENERAL_INFORMATION')->nullable();
            $table->text('F_PLANT')->nullable();
            $table->text('F_PROPAGATION')->nullable();
            $table->text('F_UTILIZATION')->nullable();
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
        Schema::dropIfExists('flowers');
    }
}
