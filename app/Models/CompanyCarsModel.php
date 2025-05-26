<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CompanyCarsModel extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'company_cars';

    /**
     * @var string[]
     */
    protected $fillable =
        [
            'car_id',
            'employee_id',
            'car_status_id',
            'car_color_id',
            'license_plate',
            'vin',
            'mileage',
            'year',
            'sort_order',
        ];

    /**
     * @return BelongsTo
     */
    public function car(): BelongsTo
    {
        return $this->belongsTo(CarsModel::class, 'car_id');
    }

    /**
     * @return BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(EmployeesModel::class, 'employee_id');
    }

    /**
     * @return BelongsTo
     */
    public function carStatus(): BelongsTo
    {
        return $this->belongsTo(CarStatusesModel::class, 'car_status_id');
    }

    /**
     * @return BelongsTo
     */
    public function carColor(): BelongsTo
    {
        return $this->belongsTo(CarColorsModel::class, 'car_color_id');
    }
}
