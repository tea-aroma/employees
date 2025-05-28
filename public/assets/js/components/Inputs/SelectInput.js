import { Input } from './Input.js';
import { createHtmlElement } from '../../standards/functions/createHtmlElement.js';
import { InputSettings } from './InputSettings.js';
import { SelectInputSettings } from './SelectInputSettings.js';


/**
 * @inheritDoc
 */
export class SelectInput extends Input
{
    /**
     * @constructor
     *
     * @param { SelectInputSettingInterface } settings
     */
    constructor(settings)
    {
        super(settings);

        this._settings = settings instanceof InputSettings ? settings : new SelectInputSettings(settings);
    }

    /**
     * @inheritDoc
     *
     * @return { HTMLSelectElement }
     */
    _createDomElement()
    {
        const attributes = {};

        for (const key in this._settings)
        {
            const value = this._settings[ key ];

            if (!value || [ ...this.getIgnoredSettings(), 'options' ].includes(key))
            {
                continue;
            }

            attributes[ key ] = this._settings[ key ];
        }

        attributes.class = this._settings.domElementClassName;

        const select = createHtmlElement('select', attributes);

        select.append(...this._settings.options)

        return select;
    }

    /**
     * Updates the current component.
     *
     * @public
     *
     * @param { Array<Record<string, any>> } data
     *
     * @return { void }
     */
    update(data)
    {
        const fragment = document.createDocumentFragment();

        if (this._settings.withEmptyOption)
        {
            fragment.append(this._createEmptyOption());
        }

        for (let i = 0, n = data.length; i < n; i++)
        {
            const item = data[ i ];

            let option;

            if (this._settings.optionCreateCallback)
            {
                option = this._settings.optionCreateCallback(item);
            }
            else
            {
                option = new Option(item[ this._settings.valueColumn ], item[ this._settings.keyColumn ]);
            }


            fragment.append(option);
        }

        this._domElement.innerHTML = '';

        this._domElement.append(fragment);
    }

    /**
     * Creates an empty option.
     *
     * @protected
     *
     * @return { HTMLOptionElement }
     */
    _createEmptyOption()
    {
        return new Option('Select', '', true);
    }
}
