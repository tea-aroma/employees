<?php

namespace App\Repositories;


use App\Data\ViewSchedules\ViewScheduleData;
use App\Data\ViewSchedules\ViewScheduleDataOptions;
use App\Models\ViewSchedulesModel;
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
class ViewSchedulesRepository extends Repository implements ReadInterface, FindInterface
{
    /**
     * @var string|null
     */
    protected ?string $modelNamespace = ViewSchedulesModel::class;

    /**
     * @var CacheTag
     */
    protected CacheTag $cacheTag = CacheTag::SCHEDULES;

    /**
     * @inheritDoc
     *
     * @param OptionsInterface $options
     *
     * @return Collection<ViewScheduleData>
     */
    public function records(OptionsInterface $options): Collection
    {
        if (!is_a($options, ViewScheduleDataOptions::class))
        {
            throw new \LogicException(ErrorMessage::INVALID_ATTRIBUTES->format($options::class, ViewScheduleDataOptions::class));
        }

        return $this->cacheRepository->remember($options->toSha512(), function () use ($options)
        {
            $builder = $this->model->newQuery();

            return ViewScheduleData::map($builder->get(), false);
        });
    }

    /**
     * @inheritDoc
     *
     * @param int $id
     *
     * @return ViewScheduleData|null
     */
    public function find(int $id): ?ViewScheduleData
    {
        return $this->cacheRepository->remember($id, function () use ($id)
        {
            return ViewScheduleData::fromModel($this->model->newQuery()->find($id));
        });
    }
}
