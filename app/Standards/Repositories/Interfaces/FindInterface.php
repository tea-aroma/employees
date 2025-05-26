<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Abstracts\Data;


/**
 * Interface for finding a record.
 */
interface FindInterface
{
    /**
     * Finds a record by the specified id.
     *
     * @param int $id
     *
     * @return Data|null
     */
    public function find(int $id): ?Data;
}
