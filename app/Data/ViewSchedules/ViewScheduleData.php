<?php

namespace App\Data\ViewSchedules;


use App\Standards\Data\Abstracts\Data;


/**
 * @inheritDoc
 */
class ViewScheduleData extends Data
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var int
     */
    public int $schedule_status_id;

    /**
     * @var string
     */
    public string $schedule_status_name;

    /**
     * @var int
     */
    public int $company_car_id;

    /**
     * @var string
     */
    public string $license_plate;

    /**
     * @var int
     */
    public int $driver_id;

    /**
     * @var string
     */
    public string $driver_full_name;

    /**
     * @var int
     */
    public int $employee_id;

    /**
     * @var string
     */
    public string $employee_full_name;

    /**
     * @var int
     */
    public int $trip_type_id;

    /**
     * @var string
     */
    public string $trip_type_name;

    /**
     * @var string
     */
    public string $description;

    /**
     * @var string
     */
    public string $start_date;

    /**
     * @var string
     */
    public string $end_date;
}
