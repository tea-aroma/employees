<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarBrandsModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'car_brands';

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
