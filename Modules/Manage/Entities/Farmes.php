<?php

namespace Modules\Manage\Entities;

use Illuminate\Database\Eloquent\Model;

class Farmes extends Model
{
    protected $table = 'farmes';

    protected $fillable = [
        'id',
        'FA_GROUPNAME',
        'FA_TITLE',
        'FA_NAME',
        'FA_HOUSENUMBER',
        'FA_MOO',
        'FA_SUB_DISTRICT',
        'FA_DISTRICT',
        'FA_PROVINCE',
        'FA_PHONE',
        'FA_LAT',
        'FA_LONG',
        'FA_FARM',
        'FA_FARM_WORK',
        'FA_METER',
        'FA_DETAIL',
        'FA_FLOWER',
        'FA_CUSTOMER_GROUP',
        'FA_PROBLEM_PLANT',
        'FA_SEND',
        // 'FA_SEND_OTHER',
        'FA_SELL',
        // 'FA_CONDITION_SELL',
        // 'FA_CONDITION_SELL_OTHER',
        // 'FA_CUSTOMER_PAYS',
        // 'FA_CUSTOMER_PAYS_OTHER',
        // 'FA_PROMOTION',
        // 'FA_PROMOTION_OTHER',
        'FA_LABOR',
        // 'FA_VOLUME',
        'FA_REMAINING',
        'FA_REMAINING_CAUSE',
        // 'FA_REMAINING_CAUSE_OTHER',
        'FA_SET_PRICE',
        'FA_PROBLEM',

        'file',
        'file_multiple',
        '_token'
    ];
}