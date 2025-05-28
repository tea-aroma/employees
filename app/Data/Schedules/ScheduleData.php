<?php

namespace App\Data\Schedules;


use App\Data\CompanyCars\CompanyCarData;
use App\Data\Employees\EmployeeData;
use App\Repositories\CompanyCarsRepository;
use App\Repositories\EmployeesRepository;
use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Traits\HasClassifier;


/**
 * @inheritDoc
 */
class ScheduleData extends Data
{
    use HasClassifier;

    /**
     * @var int
     */
    public int $id;

    /**
     * @var int
     */
    public int $schedule_status_id;

    /**
     * @var int
     */
    public int $company_car_id;

    /**
     * @var int
     */
    public int $employee_id;

    /**
     * @var int
     */
    public int $trip_type_id;

    /**
     * @var string
     */
    public string $start_date;

    /**
     * @var string
     */
    public string $end_date;

    /**
     * @var string
     */
    public string $description;

    /**
     * @var string
     */
    public string $created_at;

    /**
     * @var string
     */
    public string $updated_at;

    /**
     * Gets company car relation.
     *
     * @return CompanyCarData
     */
    public function companyCar(): CompanyCarData
    {
        return CompanyCarsRepository::query()->find($this->company_car_id);
    }

    /**
     * Gets employee relation.
     *
     * @return EmployeeData
     */
    public function employee(): EmployeeData
    {
        return EmployeesRepository::query()->find($this->employee_id);
    }
}
