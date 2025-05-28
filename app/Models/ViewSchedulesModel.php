<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ViewSchedulesModel extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'v_schedules';

    /**
     * @var bool
     */
    public $timestamps = false;
}
