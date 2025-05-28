<?php

namespace App\Data\ViewEmployees;


use App\Data\Classifiers\ClassifierData;
use App\Standards\Data\Interfaces\OptionsInterface;


/**
 * @inheritDoc
 */
class ViewEmployeeDataOptions extends ClassifierData implements OptionsInterface
{
    /**
     * @var bool
     */
    public bool $is_driver;
}
