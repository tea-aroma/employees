<?php

namespace App\Standards\Data\Abstracts;


use App\Standards\Data\Interfaces\AttributesInterface;


/**
 * Provides help working for attribute data properties.
 */
abstract class AttributesData extends Data implements AttributesInterface
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var string|null
     */
    public ?string $created_at = null;

    /**
     * @var string|null
     */
    public ?string $updated_at = null;

    /**
     * @var string|null
     */
    public ?string $deleted_at = null;
}
