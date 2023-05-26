<?php

namespace Modules\Manage\Entities;

use Illuminate\Database\Eloquent\Model;

class Reportmeeting extends Model
{
    protected $table = 'reportmeeting';

    protected $fillable = [
        'id_user',
        'month',
        'year',
        'round',
        'year_round',
        'year_budget',
        'district',
        'amphur',
        'province',
        'district1',
        'month1',
        'date_report',
        'location',
        'district2',
        'amphur2',
        'province2',
        'secure',
        'economy',
        'budget',
        'environment',
        'education',
        'director',
        'name_head',
        'position_head'
    ];
}