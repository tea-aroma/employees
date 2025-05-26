<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarColorsModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'car_colors';

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
