<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Interfaces\AttributesInterface;


/**
 * Interface for writing or updating records.
 */
interface WriteOrUpdateInterface
{
    /**
     * Writes or updates a record by the specified attributes and values.
     *
     * @param AttributesInterface $attributes
     * @param AttributesInterface $values
     *
     * @return Data
     */
    public function writeOrUpdate(AttributesInterface $attributes, AttributesInterface $values): Data;
}
