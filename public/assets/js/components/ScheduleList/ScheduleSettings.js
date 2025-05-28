/**
 * Provides all possible settings for ScheduleList component.
 */
export class ScheduleSettings
{
    /**
     * @typedef { Object } ScheduleSettingInterface
     *
     * @property { HTMLDivElement? } domElement
     *
     * @property { string? } domElementClassName
     *
     * @property { Array<keyof ScheduleDataInterface>? } labels
     *
     * @property { string? } url
     */

    /**
     * @public
     *
     * @type { HTMLDivElement }
     */
    domElement;

    /**
     * @public
     *
     * @type { string }
     */
    domElementClassName = 'schedule-list schedule-list--style-default schedule-list--type-default';

    /**
     * @public
     *
     * @type { string }
     */
    domFilterColumnClassName = 'schedule-list__filter-column';

    /**
     * @public
     *
     * @type { string }
     */
    domListClassName = 'schedule-list__list';

    /**
     * @public
     *
     * @type { string }
     */
    domItemClassName = 'schedule-list__item';

    /**
     * @public
     *
     * @type { Array<keyof ScheduleDataInterface> }
     */
    labels = [];

    /**
     * @constructor
     *
     * @param { ScheduleSettingInterface } settings
     */
    constructor(settings)
    {
        Object.assign(this, settings);
    }
}
