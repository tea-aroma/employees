<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


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

    /**
     * @return BelongsToMany
     */
    public function carComforts(): BelongsToMany
    {
        return $this->belongsToMany(CarComfortsModel::class, 'positions_to_car_comforts', 'position_id', 'car_comfort_id', 'id');
    }
}
