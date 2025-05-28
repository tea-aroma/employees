<?php

namespace App\Repositories;


use App\Data\ViewEmployees\ViewEmployeeData;
use App\Data\ViewEmployees\ViewEmployeeDataOptions;
use App\Models\ViewEmployeesModel;
use App\Standards\Data\Interfaces\OptionsInterface;
use App\Standards\Enums\CacheTag;
use App\Standards\Enums\ErrorMessage;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindInterface;
use App\Standards\Repositories\Interfaces\ReadInterface;
use Illuminate\Support\Collection;


/**
 * @inheritDoc
 */
class ViewEmployeesRepository extends Repository implements ReadInterface, FindInterface
{
    /**
     * @var string|null
     */
    protected ?string $modelNamespace = ViewEmployeesModel::class;

    /**
     * @var CacheTag
     */
    protected CacheTag $cacheTag = CacheTag::EMPLOYEES;

    /**
     * @inheritDoc
     *
     * @param OptionsInterface $options
     *
     * @return Collection<ViewEmployeeData>
     */
    public function records(OptionsInterface $options): Collection
    {
        if (!is_a($options, ViewEmployeeDataOptions::class))
        {
            throw new \LogicException(ErrorMessage::INVALID_ATTRIBUTES->format($options::class, ViewEmployeeDataOptions::class));
        }

        return $this->cacheRepository->remember($options->toSha512(), function () use ($options)
        {
            $builder = $this->model->newQuery();

            if (isset($options->is_driver))
            {
                $builder->where('is_driver', '=', $options->is_driver);
            }

            return ViewEmployeeData::map($builder->get());
        });
    }

    /**
     * @inheritDoc
     *
     * @param int $id
     *
     * @return ViewEmployeeData|null
     */
    public function find(int $id): ?ViewEmployeeData
    {
        return $this->cacheRepository->remember($id, function () use ($id)
        {
            return ViewEmployeeData::fromModel($this->model->newQuery()->find($id));
        });
    }
}
