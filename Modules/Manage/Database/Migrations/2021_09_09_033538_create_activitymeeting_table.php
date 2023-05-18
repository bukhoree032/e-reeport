<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitymeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitymeeting', function (Blueprint $table) {
            $table->id('id_ac_mee');

            $table->string('id_meet')->nullable();
            $table->string('id_ac')->nullable();
            $table->string('strength')->nullable();
            $table->string('picture_meet')->nullable();
            
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
        Schema::dropIfExists('activitymeeting');
    }
}
