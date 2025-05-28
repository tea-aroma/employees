import { InputSettings } from './InputSettings.js';


/**
 * @inheritDoc
 */
export class SelectInputSettings extends InputSettings
{
    /**
     * @typedef { InputSettingInterface } SelectInputSettingInterface
     *
     * @property { string? } keyColumn
     *
     * @property { string? } valueColumn
     *
     * @property { ((item) => HTMLOptionElement) } optionCreateCallback
     *
     * @property { Array<HTMLOptionElement>? } options
     *
     * @property { boolean? } withEmptyOption
     */

    /**
     * @public
     *
     * @type { string }
     */
    keyColumn = 'id';

    /**
     * @public
     *
     * @type { string }
     */
    valueColumn = 'name';

    /**
     * @public
     *
     * @type { (item) => HTMLOptionElement }
     */
    optionCreateCallback;

    /**
     * @public
     *
     * @type { Array<HTMLOptionElement> }
     */
    options = [];

    /**
     * @public
     *
     * @type { boolean }
     */
    withEmptyOption = false;

    /**
     * @constructor
     *
     * @param { InputSettingInterface } settings
     */
    constructor(settings)
    {
        super(settings);

        Object.assign(this, settings);
    }
}
