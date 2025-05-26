<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentsModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'departments';

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
