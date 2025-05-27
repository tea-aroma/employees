<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class CarComfortsModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'car_comforts';

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
    public function positions(): BelongsToMany
    {
        return $this->belongsToMany(PositionsModel::class, 'positions_to_car_comforts', 'car_comfort_id', 'position_id', 'id');
    }
}
