<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Interfaces\AttributesInterface;


/**
 * Interface for writing records.
 */
interface WriteInterface
{
    /**
     * Writes a record by the specified attributes.
     *
     * @param AttributesInterface $attributes
     *
     * @return Data
     */
    public function write(AttributesInterface $attributes): Data;
}
