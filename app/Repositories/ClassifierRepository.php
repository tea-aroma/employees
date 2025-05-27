<?php

namespace App\Repositories;


use App\Data\Classifiers\ClassifierData;
use App\Standards\Data\Interfaces\OptionsInterface;
use App\Standards\Enums\CacheTag;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindInterface;
use App\Standards\Repositories\Interfaces\ForModelInterface;
use App\Standards\Repositories\Interfaces\ReadInterface;
use Illuminate\Support\Collection;


/**
 * @inheritDoc
 */
class ClassifierRepository extends Repository implements ForModelInterface, ReadInterface, FindInterface
{
    /**
     * @inheritdoc
     *
     * @var CacheTag
     */
    protected CacheTag $cacheTag = CacheTag::CLASSIFIERS;

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
        return $this->cacheRepository->remember($this->modelNamespace . $options->toSha512(), function () use ($options)
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
        return $this->cacheRepository->remember($this->modelNamespace . $id, function () use ($id)
        {
            return ClassifierData::fromModel($this->model->newQuery()->find($id));
        });
    }
}
