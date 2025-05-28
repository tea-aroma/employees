import { Data } from '../../standards/Data/Data.js';


export class EmployeeData extends Data
{
    /**
     * @typedef { Object<keyof EmployeeData, typeof EmployeeData[ keyof EmployeeData ]> } EmployeeDataInterface
     */

    /**
     * @public
     *
     * @type { int }
     */
    id;

    /**
     * @public
     *
     * @type { int }
     */
    position_id;

    /**
     * @public
     *
     * @type { string }
     */
    position_name;

    /**
     * @public
     *
     * @type { string }
     */
    position_code;

    /**
     * @public
     *
     * @type { int }
     */
    department_id

    /**
     * @public
     *
     * @type { string }
     */
    department_name;

    /**
     * @public
     *
     * @type { string }
     */
    department_code;

    /**
     * @public
     *
     * @type { int }
     */
    employee_status_id

    /**
     * @public
     *
     * @type { string }
     */
    employee_status_name;

    /**
     * @public
     *
     * @type { string }
     */
    employee_status_code;

    /**
     * @public
     *
     * @type { boolean }
     */
    is_driver;

    /**
     * @public
     *
     * @type { string }
     */
    first_name;

    /**
     * @public
     *
     * @type { string }
     */
    last_name;

    /**
     * @public
     *
     * @type { string }
     */
    patronymic;

    /**
     * @public
     *
     * @type { string }
     */
    full_name;

    /**
     * @public
     *
     * @type { string }
     */
    email;

    /**
     * @public
     *
     * @type { string }
     */
    phone;

    /**
     * @public
     *
     * @type { string }
     */
    hire_date;

    /**
     * @public
     *
     * @type { string }
     */
    created_at;

    /**
     * @public
     *
     * @type { string }
     */
    updated_at;

    /**
     * @public
     *
     * @type { string }
     */
    deleted_at;
}
