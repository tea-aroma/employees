<?php

namespace App\Data;


use App\Standards\Data\Abstracts\Data;


/**
 * @inheritDoc
 */
class ClassifierData extends Data
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $code;

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
}
