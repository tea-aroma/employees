<?php

namespace App\Repositories;


use App\Data\CompanyCars\CompanyCarData;
use App\Models\CompanyCarsModel;
use App\Standards\Data\Interfaces\OptionsInterface;
use App\Standards\Enums\CacheTag;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindInterface;
use App\Standards\Repositories\Interfaces\ReadInterface;
use Illuminate\Support\Collection;


/**
 * @inheritDoc
 */
class CompanyCarsRepository extends Repository implements ReadInterface, FindInterface
{
    /**
     * @var string|null
     */
    protected ?string $modelNamespace = CompanyCarsModel::class;

    /**
     * @var CacheTag
     */
    protected CacheTag $cacheTag = CacheTag::COMPANY_CARS;

    /**
     * @inheritDoc
     *
     * @param OptionsInterface $options
     *
     * @return Collection<CompanyCarData>
     */
    public function records(OptionsInterface $options): Collection
    {
        return $this->cacheRepository->remember($options->toSha512(), function () use ($options)
        {
            return $this->map($this->model::all(), CompanyCarData::class);
        });
    }

    /**
     * @inheritDoc
     *
     * @param int $id
     *
     * @return CompanyCarData|null
     */
    public function find(int $id): ?CompanyCarData
    {
        return $this->cacheRepository->remember($id, function () use ($id)
        {
            return CompanyCarData::fromModel($this->model->newQuery()->find($id));
        });
    }
}
