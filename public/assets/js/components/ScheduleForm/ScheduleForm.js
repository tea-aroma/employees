import { Form } from '../Forms/Form.js';
import { InputType } from '../Inputs/InputType.js';
import { HttpRequest } from '../../standards/Requests/HttpRequest.js';
import { InputEvent } from '../Inputs/InputEvent.js';
import { FormEvent } from '../Forms/FormEvent.js';


/**
 * Provides logic for Schedule component.
 */
export class ScheduleForm
{
    /**
     * @public
     *
     * @type { Form }
     */
    form;

    /**
     * Initializes the base logic.
     *
     * @public
     *
     * @return { void }
     */
    async initialization()
    {
        this.form = new Form(this._getFormSettings());

        this.form.initialization();

        this.formItem('employee').update(await this.getEmployees());

        this.formItem('employee').customEvents.subscribe(InputEvent.CHANGE, this._employeeChangeHandler.bind(this));

        this.formItem('start_date').customEvents.subscribe(InputEvent.CHANGE, this._employeeChangeHandler.bind(this));

        this.formItem('end_date').customEvents.subscribe(InputEvent.CHANGE, this._employeeChangeHandler.bind(this));

        this.formItem('trip').update(await this.getTrips());

        this.form.customEvents.subscribe(FormEvent.SUBMIT, this._formSubmitHandler.bind(this));

        document.querySelector('main').append(this.form.getDomElement());
    }

    /**
     * Handles the event for the form submit.
     *
     * @protected
     *
     * @param { PointerEvent } event
     *
     * @return { void }
     */
    async _formSubmitHandler(event)
    {
        if (!this.form.validate())
        {
            return;
        }

        const response = await this.save();

        console.log(response.record);

        this.form.clear();

        this.formItem('car').disabled(true);
    }

    /**
     * Saves the schedule.
     *
     * @public
     *
     * @return { Promise<HttpResponse> }
     */
    async save()
    {
        const httpRequest = await HttpRequest.send({ url: 'api/v1/schedules/write', method: 'post', data: this.form.toJson() });

        return httpRequest.getResponse();
    }

    /**
     * Handles the change event for employee select.
     *
     * @protected
     *
     * @return { void }
     */
    async _employeeChangeHandler()
    {
        this.formItem('car').clear();

        if (!this.checkDataForCompanyCars())
        {
            return;
        }

        const cars = await this.getAvailableCompanyCars();

        if (!cars)
        {
            this.formItem('car').disabled(true);

            return;
        }

        this.formItem('car').disabled(false);

        this.formItem('car').update(cars);
    }

    /**
     * Determines whether the data for company cars request is available.
     *
     * @public
     *
     * @return { boolean }
     */
    checkDataForCompanyCars()
    {
        const data = this.getDataForCompanyCars();

        for (const key in data)
        {
            if (!data[key])
            {
                return false;
            }
        }

        return true;
    }

    /**
     * Gets the data for company cars request.
     *
     * @public
     *
     * @return { Record<string, any> }
     */
    getDataForCompanyCars()
    {
        return {
            only_available: true,
            target_employee_id: parseInt(this.formItem('employee').getValue()),
            start_date: this.formItem('start_date').getValue(),
            end_date: this.formItem('end_date').getValue(),
        };
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
                    id: 'car',
                    name: 'company_car_id',
                    type: InputType.SELECT,
                    valueColumn: 'company_car_name',
                    label: 'Car (licence_plate | driver | comport)',
                    disabled: true,
                },
                {
                    id: 'trip',
                    name: 'trip_type_id',
                    type: InputType.SELECT,
                    label: 'Trip',
                },
                {
                    id: 'description',
                    name: 'description',
                    type: InputType.TEXT,
                    placeholder: '...',
                    label: 'Description',
                }
            ],
        };
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
        const httpRequest = await HttpRequest.send({ url: 'api/v1/employees/list', method: 'get', data: { is_driver: false } });

        return httpRequest.getResponse().data;
    }

    /**
     * Gets trips.
     *
     * @public
     *
     * @return { Promise<Array<ClassifierDataInterface>> }
     */
    async getTrips()
    {
        const httpRequest = await HttpRequest.send({ url: 'api/v1/classifiers/list', method: 'get', data: { classifier_model: 'TRIP_TYPE' } });

        return httpRequest.getResponse().data;
    }

    /**
     * Gets available cars.
     *
     * @public
     *
     * @return { Promise<Array<AvailableCompanyCarDataInterface>> }
     */
    async getAvailableCompanyCars()
    {
        const httpRequest = await HttpRequest.send({ url: 'api/v1/company-cars/available-list', method: 'get', data: this.getDataForCompanyCars() });

        return httpRequest.getResponse().data;
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
        return this.form.getItem(id);
    }
}
