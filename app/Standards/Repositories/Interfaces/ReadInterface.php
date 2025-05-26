<?php

namespace App\Standards\Repositories\Interfaces;


use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Interfaces\OptionsInterface;
use Illuminate\Support\Collection;


/**
 * Interface for reading records.
 */
interface ReadInterface
{
    /**
     * Gets all records by the specified options.
     *
     * @param OptionsInterface $options
     *
     * @return Collection<Data>
     */
    public function records(OptionsInterface $options): Collection;
}
