<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CarModelsModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'car_models';

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
     * @return BelongsTo
     */
    public function carBrand(): BelongsTo
    {
        return $this->belongsTo(CarBrandsModel::class, 'car_brand_id');
    }
}
