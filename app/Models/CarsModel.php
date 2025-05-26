<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CarsModel extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'cars';

    /**
     * @var string[]
     */
    protected $fillable =
        [
            'car_brand_id',
            'car_model_id',
            'car_type_id',
            'car_comfort_id',
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

    /**
     * @return BelongsTo
     */
    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModelsModel::class, 'car_model_id');
    }

    /**
     * @return BelongsTo
     */
    public function carType(): BelongsTo
    {
        return $this->belongsTo(CarTypesModel::class, 'car_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function carComfort(): BelongsTo
    {
        return $this->belongsTo(CarComfortsModel::class, 'car_comfort_id');
    }
}
