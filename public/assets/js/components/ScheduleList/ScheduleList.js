import { ScheduleSettings } from './ScheduleSettings.js';
import { createHtmlElement } from '../../standards/functions/createHtmlElement.js';
import { HttpRequest } from '../../standards/Requests/HttpRequest.js';
import { InputType } from '../Inputs/InputType.js';
import { Form } from '../Forms/Form.js';
import { FormEvent } from '../Forms/FormEvent.js';


/**
 * Provides the logic for schedule list.
 */
export class ScheduleList
{
    /**
     * @protected
     *
     * @type { HTMLDivElement }
     */
    _domElement;

    /**
     * @protected
     *
     * @type { ScheduleSettings }
     */
    _settings;

    /**
     * @protected
     *
     * @type { Form }
     */
    _form;

    /**
     * @protected
     *
     * @type { HTMLDivElement }
     */
    _domFilterColumn;

    /**
     * @protected
     *
     * @type { HTMLUListElement }
     */
    _domList;

    /**
     * @protected
     *
     * @type { Map<string, HTMLLIElement> }
     */
    _domItems;

    /**
     * @constructor
     *
     * @param { ScheduleSettingInterface } settings
     */
    constructor(settings)
    {
        this._settings = settings instanceof ScheduleSettings ? settings : new ScheduleSettings(settings);
    }

    /**
     * Initializes the base logic.
     *
     * @public
     *
     * @return { void }
     */
    async initialization()
    {
        this._domFilterColumn = this._createDomFilterColumn();

        this._domList = this._createDomList();

        this._form = new Form(this._getFormSettings());

        this._form.initialization();

        this._form.customEvents.subscribe(FormEvent.ENTER, () =>
        {
            this.update();
        });

        this.formItem('employee').update(await this.getEmployees());

        this._domFilterColumn.append(this._form.getDomElement());

        this._domElement = this._settings.domElement || this._createDomElement();

        this.update();

        document.querySelector('.main').append(this._domElement);
    }

    /**
     * Updates the component.
     *
     * @public
     *
     * @return { void }
     */
    async update()
    {
        const records = await this.getRecords();

        this.createDomItems(records);
    }

    /**
     * Creates items.
     *
     * @public
     *
     * @param { Array<ScheduleData> } data
     *
     * @return { void }
     */
    createDomItems(data)
    {
        this._domList.innerHTML = '';

        const fragment = document.createDocumentFragment();

        if (!data)
        {
            fragment.append(createHtmlElement('li', { class: 'schedule-list__item' }, [ new Text('No records..') ]));
        }
        else
        {
            for (let i = 0, n = data.length; i < n; i++)
            {
                const item = this._createDomItem(data[ i ]);

                fragment.append(item);
            }
        }

        this._domList.append(fragment);
    }

    /**
     * Creates a new dom element.
     *
     * @protected
     *
     * @return { HTMLDivElement }
     */
    _createDomElement()
    {
        return createHtmlElement('div', { class: this._settings.domElementClassName }, [ this._domFilterColumn, this._domList ]);
    }

    /**
     * Creates a filter column element.
     *
     * @protected
     *
     * @return { HTMLDivElement }
     */
    _createDomFilterColumn()
    {
        return createHtmlElement('div', { class: this._settings.domFilterColumnClassName });
    }

    /**
     * Creates a list element.
     *
     * @protected
     *
     * @return { HTMLUListElement }
     */
    _createDomList()
    {
        return createHtmlElement('ul', { class: this._settings.domListClassName });
    }

    /**
     * Creates an item element.
     *
     * @protected
     *
     * @param { ScheduleData | AvailableCompanyCarDataInterface } record
     *
     * @return { HTMLLIElement }
     */
    _createDomItem(record)
    {
        const item = createHtmlElement('li', { class: this._settings.domItemClassName });

        let string;

        if (this.formItem('type').getValue() === '1')
        {
            string = record.company_car_name;
        }
        else
        {
            string = record.id + ' | Driver: ' + record.driver_full_name + ' | Employee: ' + record.employee_full_name + ' | Start date: ' + record.start_date + ' | End date: ' + record.end_date;
        }

        item.innerText = string;

        return item;
    }

    /**
     * Gets records.
     *
     * @public
     *
     * @return { Promise<Array<ScheduleData>> }
     */
    async getRecords()
    {
        const httpRequest = await HttpRequest.send({ url: 'api/v1/schedules/list', method: 'get', data: this._form.toObject() });

        return httpRequest.getResponse().data;
    }

    /**
     * Gets employees.
     *
     * @public
     *
     * @return { Promise<Array<EmployeeDataInterface>> }
     */
    async getEmployees()
    {
        const httpRequest = await HttpRequest.send({ url: 'api/v1/employees/list', method: 'get', data: {  } });

        return httpRequest.getResponse().data;
    }

    /**
     * Gets the settings for Form component.
     *
     * @property
     *
     * @return { FormSettingInterface }
     */
    _getFormSettings()
    {
        return {
            domElementClassName: 'form form--type-line',
            withoutButton: true,
            items:
                [
                    {
                        id: 'employee',
                        name: 'employee_id',
                        type: InputType.SELECT,
                        label: 'Employee',
                        valueColumn: 'full_name',
                        withEmptyOption: true,
                    },
                    {
                        id: 'start_date',
                        name: 'start_date',
                        type: InputType.DATETIME,
                        label: 'Start date',
                    },
                    {
                        id: 'end_date',
                        name: 'end_date',
                        type: InputType.DATETIME,
                        label: 'End date',
                    },
                    {
                        id: 'type',
                        name: 'type',
                        type: InputType.SELECT,
                        label: 'Type',
                        withEmptyOption: true,
                        options:
                            [
                                new Option('Available', '0'),
                                new Option('Possible', '1'),
                            ]
                    },
                ],
        };
    }

    /**
     * Gets the dom element.
     *
     * @public
     *
     * @return { HTMLDivElement }
     */
    getDomElement()
    {
        return this._domElement;
    }

    /**
     * Gets a form item by the specified id.
     *
     * @public
     *
     * @return { TextInput | SelectInput }
     */
    formItem(id)
    {
        return this._form.getItem(id);
    }
}
