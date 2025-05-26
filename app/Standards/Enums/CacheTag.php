<?php

namespace App\Standards\Enums;


/**
 * Represents a cache tag for this app.
 */
enum CacheTag: string
{
    case CLASSIFIERS = 'CLASSIFIERS';

    case CARS = 'CARS';

    case EMPLOYEES = 'EMPLOYEES';

    case SCHEDULES = 'SCHEDULES';
}
