<?php

namespace App\Data\ViewSchedules;


use App\Standards\Data\Interfaces\OptionsInterface;


/**
 * @inheritDoc
 */
class ViewScheduleDataOptions extends ViewScheduleData implements OptionsInterface
{
    public int $type;
}
