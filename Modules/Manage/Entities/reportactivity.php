<?php

namespace Modules\Manage\Entities;

use Illuminate\Database\Eloquent\Model;

class Eeportactivity extends Model
{
    protected $table = 'reportactivity';

    protected $fillable = [
        'id_ac_report',
        'id_report',
        'id_ac',
        're_ac_name',
        're_ac_approve',
        're_ac_withdraw',
        're_ac_target',
        're_ac_income',
        're_ac_quality',
        're_ac_problem',
        're_ac_note'
    ];
}