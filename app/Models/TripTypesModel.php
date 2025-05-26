<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TripTypesModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'trip_types';

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
