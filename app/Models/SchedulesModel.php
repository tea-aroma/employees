<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class SchedulesModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'schedules';

    /**
     * @var string[]
     */
    protected $fillable =
        [
            'schedule_status_id',
            'company_car_id',
            'employee_id',
            'trip_type_id',
            'start_date',
            'end_date',
            'description',
        ];

    /**
     * @return BelongsTo
     */
    public function scheduleStatus(): BelongsTo
    {
        return $this->belongsTo(ScheduleStatusesModel::class , 'schedule_status_id');
    }

    /**
     * @return BelongsTo
     */
    public function companyCar(): BelongsTo
    {
        return $this->belongsTo(CompanyCarsModel::class, 'company_car_id');
    }

    /**
     * @return BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(EmployeesModel::class, 'employee_id');
    }
}
