<?php

namespace App\Data\Cars;


use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Traits\HasClassifier;


/**
 * @inheritDoc
 */
class CarData extends Data
{
    use HasClassifier;

    /**
     * @var int
     */
    public int $id;

    /**
     * @var int
     */
    public int $car_brand_id;

    /**
     * @var int
     */
    public int $car_model_id;

    /**
     * @var int
     */
    public int $car_type_id;

    /**
     * @var int
     */
    public int $car_comfort_id;

    /**
     * @var string
     */
    public string $description;

    /**
     * @var int
     */
    public int $sort_order;

    /**
     * @var bool
     */
    public bool $is_active;

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
}
