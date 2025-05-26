<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Interfaces\AttributesInterface;


/**
 * Interface for finding or updating records.
 */
interface FindOrCreateInterface
{
    /**
     * Finds or creates a record by the specified attributes and values.
     *
     * @param AttributesInterface $attributes
     * @param AttributesInterface $values
     *
     * @return Data
     */
    public function findOrCreate(AttributesInterface $attributes, AttributesInterface $values): Data;
}
