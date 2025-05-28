<?php

namespace App\Data\CompanyCars;


use App\Standards\Data\Interfaces\OptionsInterface;


/**
 * @inheritDoc
 */
class CompanyCarDataOptions extends CompanyCarData implements OptionsInterface
{
    /**
     * @var int|null
     */
    public ?int $target_employee_id;

    /**
     * @var string|null
     */
    public ?string $start_date;

    /**
     * @var string|null
     */
    public ?string $end_date;

    /**
     * @var int
     */
    public int $car_comfort_id;

    /**
     * @var int
     */
    public int $car_model_id;

}
