<?php

namespace Modules\Manage\Entities;

use Illuminate\Database\Eloquent\Model;

class Activity_meeting extends Model
{
    protected $table = 'activity_meeting';

    protected $fillable = [
        'id_ac_meet',
        'id_meet',
        'id_ac',
        'strength',
        'picture_meet',
    ];
}
