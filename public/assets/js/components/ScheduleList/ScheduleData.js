import { Data } from '../../standards/Data/Data.js';


export class ScheduleData extends Data
{
    /**
     * @typedef { Object<keyof ScheduleData, typeof ScheduleData[ keyof ScheduleData ]> } ScheduleDataInterface
     */

    /**
     * @public
     *
     * @type { string }
     */
    id;

    /**
     * @public
     *
     * @type { string }
     */
    schedule_status_id;

    /**
     * @public
     *
     * @type { string }
     */
    schedule_status_name;

    /**
     * @public
     *
     * @type { string }
     */
    company_car_id;

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
    driver_id;

    /**
     * @public
     *
     * @type { string }
     */
    driver_full_name;

    /**
     * @public
     *
     * @type { string }
     */
    employee_id;

    /**
     * @public
     *
     * @type { string }
     */
    employee_full_name;

    /**
     * @public
     *
     * @type { string }
     */
    trip_type_id;

    /**
     * @public
     *
     * @type { string }
     */
    trip_type_name;

    /**
     * @public
     *
     * @type { string }
     */
    description;

    /**
     * @public
     *
     * @type { string }
     */
    start_date;

    /**
     * @public
     *
     * @type { string }
     */
    end_date;
}
