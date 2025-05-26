<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PositionsToCarComfortsModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'positions_to_car_comforts';

    /**
     * @var string[]
     */
    protected $fillable =
        [
            'position_id',
            'car_comfort_id',
        ];

    /**
     * @return BelongsTo
     */
    public function position(): BelongsTo
    {
        return $this->belongsTo(PositionsModel::class, 'position_id');
    }

    /**
     * @return BelongsTo
     */
    public function carComfort(): BelongsTo
    {
        return $this->belongsTo(CarComfortsModel::class, 'car_comfort_id');
    }
}
