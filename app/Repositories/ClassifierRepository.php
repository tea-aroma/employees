<?php

namespace App\Repositories;


use App\Data\ClassifierData;
use App\Standards\Data\Interfaces\OptionsInterface;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindInterface;
use App\Standards\Repositories\Interfaces\ForModelInterface;
use App\Standards\Repositories\Interfaces\ReadInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;


/**
 * @inheritDoc
 */
class ClassifierRepository extends Repository implements ForModelInterface, ReadInterface, FindInterface
{
    /**
     * @inheritDoc
     *
     * @param string $model
     *
     * @return static
     */
    public static function forModel(string $model): static
    {
        return new self($model);
    }

    /**
     * @inheritDoc
     *
     * @param OptionsInterface $options
     *
     * @return Collection<ClassifierData>
     */
    public function records(OptionsInterface $options): Collection
    {
        return Cache::tags('classifiers')->remember($options->toSha512(), 3600, function () use ($options)
        {
            return $this->map($this->model->newQuery()->get(), ClassifierData::class);
        });
    }

    /**
     * @inheritDoc
     *
     * @param int $id
     *
     * @return ClassifierData|null
     */
    public function find(int $id): ?ClassifierData
    {
        return Cache::tags('classifiers')->remember($id, 3600, function () use ($id)
        {
            return ClassifierData::fromModel($this->model->newQuery()->findOrFail($id));
        });
    }
}
