<?php

namespace App\Repositories;


use App\Data\Cars\CarData;
use App\Models\CarsModel;
use App\Standards\Data\Interfaces\OptionsInterface;
use App\Standards\Enums\CacheTag;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindInterface;
use App\Standards\Repositories\Interfaces\ReadInterface;
use Illuminate\Support\Collection;


/**
 * @inheritDoc
 */
class CarsRepository extends Repository implements ReadInterface, FindInterface
{
    /**
     * @var string|null
     */
    protected ?string $modelNamespace = CarsModel::class;

    /**
     * @var CacheTag
     */
    protected CacheTag $cacheTag = CacheTag::CARS;

    /**
     * @inheritDoc
     *
     * @param OptionsInterface $options
     *
     * @return Collection<CarData>
     */
    public function records(OptionsInterface $options): Collection
    {
        return $this->cacheRepository->remember($options->toSha512(), function () use ($options)
        {
            return $this->map($this->model::all(), CarData::class);
        });
    }

    /**
     * @inheritDoc
     *
     * @param int $id
     *
     * @return CarData|null
     */
    public function find(int $id): ?CarData
    {
        return $this->cacheRepository->remember($id, function () use ($id)
        {
            return CarData::fromModel($this->model->newQuery()->find($id));
        });
    }
}
