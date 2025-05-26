<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleStatusesModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'schedule_statuses';

    /**
     * @var string[]
     */
    protected $fillable =
        [
            'name',
            'code',
            'description',
            'sort_order',
            'is_active',
        ];
}
