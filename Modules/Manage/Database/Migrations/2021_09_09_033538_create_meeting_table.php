<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting', function (Blueprint $table) {
            $table->id();

            $table->string('id_user')->nullable();
            $table->string('district')->nullable();
            $table->string('round')->nullable();
            $table->string('meeting_date')->nullable();
            $table->string('location')->nullable();
            $table->string('title_president')->nullable();
            $table->string('name_president')->nullable();
            $table->string('lastname_president')->nullable();
            $table->string('position_president')->nullable();
            $table->string('title_vice_president1')->nullable();
            $table->string('name_vice_president1')->nullable();
            $table->string('lastname_vice_president1')->nullable();
            $table->string('position_vice_president1')->nullable();
            $table->string('title_vice_president2')->nullable();
            $table->string('name_vice_president2')->nullable();
            $table->string('lastname_vice_president2')->nullable();
            $table->string('position_vice_president2')->nullable();
            $table->string('title_group_plan')->nullable();
            $table->string('name_group_plan')->nullable();
            $table->string('lastname_group_plan')->nullable();
            $table->string('position_group_plan')->nullable();
            $table->string('title_group_budget')->nullable();
            $table->string('name_group_budget')->nullable();
            $table->string('lastname_group_budget')->nullable();
            $table->string('position_group_budget')->nullable();
            $table->string('title_group_environment')->nullable();
            $table->string('name_group_environment')->nullable();
            $table->string('lastname_group_environment')->nullable();
            $table->string('position_group_environment')->nullable();
            $table->string('title_group_edu')->nullable();
            $table->string('name_group_edu')->nullable();
            $table->string('lastname_group_edu')->nullable();
            $table->string('position_group_edu')->nullable();
            $table->string('title_group_director')->nullable();
            $table->string('name_group_director')->nullable();
            $table->string('lastname_group_director')->nullable();
            $table->string('position_group_director')->nullable();
            $table->string('title_group_stability')->nullable();
            $table->string('name_group_stability')->nullable();
            $table->string('lastname_group_stability')->nullable();
            $table->string('position_group_stability')->nullable();
            $table->string('title_director1')->nullable();
            $table->string('name_director1')->nullable();
            $table->string('lastname_director1')->nullable();
            $table->string('position_director1')->nullable();
            $table->string('title_director2')->nullable();
            $table->string('name_director2')->nullable();
            $table->string('lastname_director2')->nullable();
            $table->string('position_director2')->nullable();
            $table->string('title_director3')->nullable();
            $table->string('name_director3')->nullable();
            $table->string('lastname_director3')->nullable();
            $table->string('position_director3')->nullable();
            $table->string('title_bailiff')->nullable();
            $table->string('name_bailiff')->nullable();
            $table->string('lastname_bailiff')->nullable();
            $table->string('position_bailiff')->nullable();
            $table->text('title_soldier')->nullable();
            $table->text('name_soldier')->nullable();
            $table->text('lastname_soldier')->nullable();
            $table->text('position_soldier')->nullable();
            $table->text('title_rule')->nullable();
            $table->text('name_rule')->nullable();
            $table->text('lastname_rule')->nullable();
            $table->text('position_rule')->nullable();
            $table->text('title_volunteer')->nullable();
            $table->text('name_volunteer')->nullable();
            $table->text('lastname_volunteer')->nullable();
            $table->text('position_volunteer')->nullable();
            $table->text('no_meeting')->nullable();
            $table->text('p_meeting')->nullable();
            $table->text('begin_meet')->nullable();
            $table->text('agenda1')->nullable();
            $table->text('r_meet_no')->nullable();
            $table->text('r_meeting_year')->nullable();
            $table->text('r_meeting_date')->nullable();
            $table->text('r_meet_edit')->nullable();
            $table->text('narcotics')->nullable();
            $table->text('unrest')->nullable();
            $table->text('guard')->nullable();
            $table->text('other1')->nullable();
            $table->text('other2')->nullable();
            $table->text('government')->nullable();
            $table->text('other3')->nullable();
            $table->text('coordinate')->nullable();
            $table->text('covid')->nullable();
            $table->text('home')->nullable();
            $table->text('elder')->nullable();
            $table->text('other4')->nullable();
            $table->text('education')->nullable();
            $table->text('other5')->nullable();
            $table->text('executive')->nullable();
            $table->text('other6')->nullable();
            $table->text('r_meeting')->nullable();
            $table->text('agenda4')->nullable();
            $table->text('resolution4')->nullable();
            $table->text('agenda5')->nullable();
            $table->text('resolution5')->nullable();
            $table->text('agenda6')->nullable();
            $table->text('end_meet')->nullable();
            $table->text('name_record')->nullable();
            $table->text('position_record')->nullable();
            $table->text('name_reporter')->nullable();
            $table->text('position_reporter')->nullable();
            $table->text('name_guarantee')->nullable();
            $table->text('position_guarantee')->nullable();


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
        Schema::dropIfExists('meeting');
    }
}
