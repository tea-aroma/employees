<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PositionsModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'positions';

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
