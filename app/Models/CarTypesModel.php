<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarTypesModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'car_types';

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
