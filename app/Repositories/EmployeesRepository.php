<?php

namespace App\Repositories;


use App\Data\Employees\EmployeeData;
use App\Models\EmployeesModel;
use App\Standards\Data\Interfaces\OptionsInterface;
use App\Standards\Enums\CacheTag;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindInterface;
use App\Standards\Repositories\Interfaces\ReadInterface;
use Illuminate\Support\Collection;


/**
 * @inheritDoc
 */
class EmployeesRepository extends Repository implements ReadInterface, FindInterface
{
    /**
     * @var string|null
     */
    protected ?string $modelNamespace = EmployeesModel::class;

    /**
     * @var CacheTag
     */
    protected CacheTag $cacheTag = CacheTag::EMPLOYEES;

    /**
     * @inheritDoc
     *
     * @param OptionsInterface $options
     *
     * @return Collection<EmployeeData>
     */
    public function records(OptionsInterface $options): Collection
    {
        return $this->cacheRepository->remember($options->toSha512(), function () use ($options)
        {
            return $this->map($this->model::all(), EmployeeData::class);
        });
    }

    /**
     * @inheritDoc
     *
     * @param int $id
     *
     * @return EmployeeData|null
     */
    public function find(int $id): ?EmployeeData
    {
        return $this->cacheRepository->remember($id, function () use ($id)
        {
            return EmployeeData::fromModel($this->model->newQuery()->find($id));
        });
    }
}
