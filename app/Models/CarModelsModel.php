<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModelsModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'car_models';

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
