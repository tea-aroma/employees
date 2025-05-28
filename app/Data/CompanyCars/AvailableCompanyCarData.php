<?php

namespace App\Data\CompanyCars;


use App\Standards\Data\Abstracts\Data;


/**
 * @inheritDoc
 */
class AvailableCompanyCarData extends Data
{
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
    public int $driver_id;

    /**
     * @var int
     */
    public int $car_status_id;

    /**
     * @var int
     */
    public int $employee_id;

    /**
     * @var int
     */
    public int $position_id;

    /**
     * @var string
     */
    public string $company_car_name;

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
}
