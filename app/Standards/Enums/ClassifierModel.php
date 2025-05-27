<?php

namespace App\Standards\Enums;


use App\Models\CarBrandsModel;
use App\Models\CarColorsModel;
use App\Models\CarComfortsModel;
use App\Models\CarsModel;
use App\Models\CarStatusesModel;
use App\Models\CarTypesModel;
use App\Models\DepartmentsModel;
use App\Models\EmployeesModel;
use App\Models\PositionsModel;
use App\Models\ScheduleStatusesModel;
use App\Models\TripTypesModel;


/**
 * Represents a classifier name for this app.
 */
enum ClassifierModel: string
{
    case DEPARTMENT = DepartmentsModel::class;

    case POSITION = PositionsModel::class;

    case EMPLOYEE_STATUS = EmployeesModel::class;

    case CAR_BRAND = carBrandsModel::class;

    case CAR_COLOR = CarColorsModel::class;

    case CAR_MODEL = CarsModel::class;

    case CAR_TYPE = CarTypesModel::class;

    case CAR_COMFORT = CarComfortsModel::class;

    case CAR_STATUS = CarStatusesModel::class;

    case SCHEDULE_STATUS = ScheduleStatusesModel::class;

    case TRIP_TYPE = TripTypesModel::class;

    /**
     * Gets the key for access database columns.
     *
     * @param string $key
     *
     * @return string
     */
    public function getKey(string $key = 'id'): string
    {
        return strtolower($this->name) . '_' . $key;
    }
}
