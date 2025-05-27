<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ViewEmployeesModel extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'v_employees';

    /**
     * @var bool
     */
    public $timestamps = false;
}
