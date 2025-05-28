import { Data } from '../../standards/Data/Data.js';


export class ClassifierData extends Data
{
    /**
     * @typedef { Object<keyof ClassifierData, typeof ClassifierData[ keyof ClassifierData ]> } ClassifierDataInterface
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
    name;

    /**
     * @public
     *
     * @type { string }
     */
    code;

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
    sort_order;

    /**
     * @public
     *
     * @type { string }
     */
    is_active;

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
}
