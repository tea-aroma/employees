<?php

namespace App\Standards\Data\Abstracts;


use App\Standards\Data\Interfaces\OptionsInterface;


/**
 * Provides help working for option data properties.
 */
abstract class OptionsData extends Data implements OptionsInterface
{
    /**
     * @var int|null
     */
    public ?int $id;

    /**
     * @var int|null
     */
    public ?int $limit;

    /**
     * @var int|null
     */
    public ?int $offset;
}
