<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportmeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportmeeting', function (Blueprint $table) {
            $table->id();

            $table->string('id_user')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('round')->nullable();
            $table->string('year_round')->nullable();
            $table->string('year_budget')->nullable();
            $table->string('district')->nullable();
            $table->string('amphur')->nullable();
            $table->string('province')->nullable();
            $table->string('district1')->nullable();
            $table->string('month1')->nullable();
            $table->string('date_report')->nullable();
            $table->string('location')->nullable();
            $table->string('district2')->nullable();
            $table->string('amphur2')->nullable();
            $table->string('province2')->nullable();
            $table->string('secure')->nullable();
            $table->string('economy')->nullable();
            $table->string('budget')->nullable();
            $table->string('environment')->nullable();
            $table->string('education')->nullable();
            $table->string('director')->nullable();
            $table->string('name_head')->nullable();
            $table->string('position_head')->nullable();


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
        Schema::dropIfExists('reportmeeting');
    }
}
