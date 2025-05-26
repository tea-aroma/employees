<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class EmployeesModel extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'employees';

    /**
     * @var string[]
     */
    protected $fillable =
        [
            'position_id',
            'department_id',
            'employee_status_id',
            'first_name',
            'last_name',
            'patronymic',
            'email',
            'phone',
            'hire_date',
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
    public function department(): BelongsTo
    {
        return $this->belongsTo(DepartmentsModel::class, 'department_id');
    }

    /**
     * @return BelongsTo
     */
    public function employeeStatus(): BelongsTo
    {
        return $this->belongsTo(EmployeeStatusesModel::class, 'employee_status_id');
    }
}
