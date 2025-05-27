<?php

namespace App\Data\ViewEmployees;


use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Traits\HasClassifier;


/**
 * @inheritDoc
 */
class ViewEmployeeData extends Data
{
    use HasClassifier;

    /**
     * @var int
     */
    public int $id;

    /**
     * @var int
     */
    public int $position_id;

    /**
     * @var string
     */
    public string $position_name;

    /**
     * @var string
     */
    public string $position_code;

    /**
     * @var int
     */
    public int $department_id;

    /**
     * @var string
     */
    public string $department_name;

    /**
     * @var string
     */
    public string $department_code;

    /**
     * @var int
     */
    public int $employee_status_id;

    /**
     * @var string
     */
    public string $employee_status_name;

    /**
     * @var string
     */
    public string $employee_status_code;

    /**
     * @var bool
     */
    public bool $is_driver;

    /**
     * @var string
     */
    public string $full_name;

    /**
     * @var string
     */
    public string $first_name;

    /**
     * @var string
     */
    public string $last_name;

    /**
     * @var string
     */
    public string $patronymic;

    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $phone;

    /**
     * @var string
     */
    public string $hire_date;

    /**
     * @var string
     */
    public string $created_at;

    /**
     * @var string
     */
    public string $updated_at;

    /**
     * @var string
     */
    public string $deleted_at;
}
