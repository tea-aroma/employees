<?php

namespace App\Standards\Enums;


/**
 * Represents an error message for this app.
 */
enum ErrorMessage: string
{
    case INVALID_ATTRIBUTES = 'Invalid attributes for "%s": expected instance of "%s".';

    case INVALID_OPTIONS = 'Invalid options for "%s": expected instance of "%s".';

    case SCHEDULE_INTERSECTION = 'Schedule with interval (%s - %s) has intersection.';

    case DRIVER_IS_ASSIGNED = 'The employee "%s" is already assigned to a driver.';

    /**
     * Formats the error message with specified arguments.
     *
     * @param string ...$args
     *
     * @return string
     */
    public function format(string ...$args): string
    {
        return sprintf($this->value, ...$args);
    }
}
