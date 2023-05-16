<?php

namespace Modules\Manage\Entities;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';

    protected $fillable = [
        'id_districts',
        'name',
        'numberpeople',
        'location'
    ];
}