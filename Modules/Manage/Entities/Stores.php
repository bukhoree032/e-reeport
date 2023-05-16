<?php

namespace Modules\Manage\Entities;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    protected $table = 'stores';

    protected $fillable = [
        'id',
        'S_NAME',
        'S_OWNER_PREFIX',
        'S_OWNER_NAME',
        'S_PHONE',
        'S_FACEBOOK',
        'S_LINE',
        'S_WEBSITE',
        'S_NUMBER',
        'S_VILLAGE',
        'S_SUB_DISTRICT',
        'S_DISTRICT',
        'S_PROVINCE',
        'S_LAT',
        'S_LONG',
        'S_DETAIL',
        'S_FLOWER',
        'S_FLOWER_OTHER',
        'S_CUSTOMER_GROUP',
        'S_CUSTOMER_GROUP_OTHER',
        'S_SOURCE',
        'S_LOCATION_AFFECT_SALE',
        'S_COMPETE',
        'S_SEND',
        'S_SEND_OTHER',
        'S_SELL',
        'S_CONDITION_SELL',
        'S_CONDITION_SELL_OTHER',
        'S_CUSTOMER_PAYS',
        'S_CUSTOMER_PAYS_OTHER',
        'S_OTHER',
        'S_PROMOTION',
        'S_PROMOTION_OTHER',
        'S_LABOR',
        'S_VOLUME',
        'S_REMAINING',
        'S_REMAINING_CAUSE',
        'S_REMAINING_CAUSE_OTHER',
        'S_SET_PRICE',
        'S_PROBLEM',
        'file',
        'file_multiple',
        '_token'
    ];
}