<?php

namespace App\Data\CompanyCars;


use App\Data\Cars\CarData;
use App\Data\Employees\EmployeeData;
use App\Repositories\CarsRepository;
use App\Repositories\EmployeesRepository;
use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Traits\HasClassifier;


/**
 * @inheritDoc
 */
class CompanyCarData extends Data
{
    use HasClassifier;

    /**
     * @var int
     */
    public int $id;

    /**
     * @var int
     */
    public int $car_id;

    /**
     * @var int
     */
    public int $employee_id;

    /**
     * @var int
     */
    public int $car_status_id;

    /**
     * @var int
     */
    public int $car_color_id;

    /**
     * @var string
     */
    public string $license_plate;

    /**
     * @var string
     */
    public string $vin;

    /**
     * @var int
     */
    public int $mileage;

    /**
     * @var int
     */
    public int $year;

    /**
     * @var int
     */
    public int $sort_order;

    /**
     * @var string
     */
    public string $created_at;

    /**
     * @var string
     */
    public string $updated_at;

    /**
     * @var string
     */
    public string $deleted_at;

    /**
     * Gets the Data of the car relation.
     *
     * @return CarData
     */
    public function car(): CarData
    {
        return CarsRepository::query()->find($this->car_id);
    }

    /**
     * Gets the Data of the employee relation.
     *
     * @return EmployeeData
     */
    public function employee(): EmployeeData
    {
        return EmployeesRepository::query()->find($this->employee_id);
    }
}
