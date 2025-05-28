<?php

namespace App\Repositories;


use App\Data\Schedules\ScheduleData;
use App\Data\Schedules\ScheduleDataAttributes;
use App\Models\SchedulesModel;
use App\Standards\Data\Interfaces\AttributesInterface;
use App\Standards\Data\Interfaces\OptionsInterface;
use App\Standards\Enums\CacheTag;
use App\Standards\Enums\ErrorMessage;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindInterface;
use App\Standards\Repositories\Interfaces\ReadInterface;
use App\Standards\Repositories\Interfaces\UpdateInterface;
use App\Standards\Repositories\Interfaces\WriteInterface;
use Illuminate\Support\Collection;


/**
 * @inheritDoc
 */
class SchedulesRepository extends Repository implements ReadInterface, FindInterface, WriteInterface, UpdateInterface
{
    /**
     * @var string|null
     */
    protected ?string $modelNamespace = SchedulesModel::class;

    /**
     * @var CacheTag
     */
    protected CacheTag $cacheTag = CacheTag::SCHEDULES;

    /**
     * @inheritDoc
     *
     * @param OptionsInterface $options
     *
     * @return Collection<ScheduleData>
     */
    public function records(OptionsInterface $options): Collection
    {
        return $this->cacheRepository->remember($options->toSha512(), function () use ($options)
        {
            return $this->map($this->model::all(), ScheduleData::class);
        });
    }

    /**
     * @inheritDoc
     *
     * @param int $id
     *
     * @return ScheduleData|null
     */
    public function find(int $id): ?ScheduleData
    {
        return $this->cacheRepository->remember($id, function () use ($id)
        {
            return ScheduleData::fromModel($this->model->newQuery()->find($id));
        });
    }

    /**
     * @inheritDoc
     *
     * @param AttributesInterface $values
     *
     * @return ScheduleData
     */
    public function write(AttributesInterface $values): ScheduleData
    {
        if (!is_a($values, ScheduleDataAttributes::class))
        {
            throw new \LogicException(ErrorMessage::INVALID_ATTRIBUTES->format($values::class, ScheduleDataAttributes::class));
        }

        $this->cacheRepository->flush();

        $record = $this->model->newQuery()->create($values->toArray());

        return ScheduleData::fromArray($record->toArray());
    }

    /**
     * @inheritDoc
     *
     * @param AttributesInterface $values
     *
     * @return int
     */
    public function update(AttributesInterface $values): int
    {
        if (!is_a($values, ScheduleDataAttributes::class))
        {
            throw new \LogicException(ErrorMessage::INVALID_ATTRIBUTES->format($values::class, ScheduleDataAttributes::class));
        }

        $this->cacheRepository->flush();

        return $this->model->newQuery()->where('id', '=', $values->id)->update($values->toArray());
    }
}
