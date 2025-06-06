<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarStatusesModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'car_statuses';

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
