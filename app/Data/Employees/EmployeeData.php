<?php

namespace App\Data\Employees;


use App\Data\Classifiers\ClassifierData;
use App\Standards\Data\Abstracts\Data;
use App\Standards\Data\Traits\HasClassifier;
use Illuminate\Support\Collection;


/**
 * @inheritDoc
 */
class EmployeeData extends Data
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
     * @var int
     */
    public int $department_id;

    /**
     * @var int
     */
    public int $employee_status_id;

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

    /**
     * @return Collection<ClassifierData>
     */
    public function carComforts(): Collection
    {
        return ClassifierData::map($this->model->carComforts);
    }
}
