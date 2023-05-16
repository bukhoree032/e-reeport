<?php

namespace Modules\Manage\Entities;

use Illuminate\Database\Eloquent\Model;

class Flowers extends Model
{
    protected $table = 'flowers';

    protected $fillable = [
        'id',
        'F_NAME',
        'F_COMMON_NAME',
        'F_SCIENTIFIC_NAME',
        'F_OTHER_NAME',
        'F_TYPE',
        'F_OVERALL_APPEARANCE',
        'F_NATURE_TRUNK',
        'F_NATURE_LEAF',
        'F_NATURE_FLOWER',
        'F_GENERAL_INFORMATION',
        'F_PLANT',
        'F_PROPAGATION',
        'F_UTILIZATION',
        'file',
        'file_multiple',
        '_token'
    ];
}
