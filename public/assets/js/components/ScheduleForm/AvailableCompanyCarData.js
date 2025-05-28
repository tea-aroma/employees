import { Data } from '../../standards/Data/Data.js';


export class AvailableCompanyCarData extends Data
{
    /**
     * @typedef { Object<keyof AvailableCompanyCarData, typeof AvailableCompanyCarData[ keyof AvailableCompanyCarData ]> } AvailableCompanyCarDataInterface
     */

    /**
     * @public
     *
     * @type { number }
     */
    id;

    /**
     * @public
     *
     * @type { number }
     */
    car_id;

    /**
     * @public
     *
     * @type { number }
     */
    driver_id;

    /**
     * @public
     *
     * @type { number }
     */
    car_status_id;

    /**
     * @public
     *
     * @type { number }
     */
    employee_id;

    /**
     * @public
     *
     * @type { number }
     */
    position_id;

    /**
     * @public
     *
     * @type { string }
     */
    company_car_name;

    /**
     * @public
     *
     * @type { string }
     */
    license_plate;

    /**
     * @public
     *
     * @type { string }
     */
    vin;

    /**
     * @public
     *
     * @type { number }
     */
    mileage;

    /**
     * @public
     *
     * @type { number }
     */
    year;

    /**
     * @public
     *
     * @type { number }
     */
    sort_order;
}
