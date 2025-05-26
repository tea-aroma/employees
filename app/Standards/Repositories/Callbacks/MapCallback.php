<?php

namespace App\Standards\Repositories\Callbacks;


use App\Standards\Data\Abstracts\Data;
use Illuminate\Database\Eloquent\Model;


/**
 * Converts the specified Model to the specified Data.
 */
class MapCallback
{
    /**
     * @var class-string<Data>
     */
    public string $interface;

    /**
     * @param string $interface
     */
    public function __construct(string $interface)
    {
        $this->interface = $interface;
    }

    /**
     * @param Model $model
     *
     * @return Data
     */
    public function __invoke(Model $model): Data
    {
        return $this->interface::fromModel($model);
    }
}
