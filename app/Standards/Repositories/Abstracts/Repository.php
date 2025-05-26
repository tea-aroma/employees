<?php

namespace App\Standards\Repositories\Abstracts;


use App\Standards\CacheRepository\Classes\CacheRepository;
use App\Standards\Data\Abstracts\Data;
use App\Standards\Enums\CacheTag;
use App\Standards\Enums\CacheTTL;
use App\Standards\Repositories\Callbacks\MapCallback;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;


/**
 * Provides the base abstract logic for managing database tables.
 */
abstract class Repository
{
    /**
     * The model namespace.
     *
     * @var class-string<Model>|null
     */
    protected ?string $modelNamespace;

    /**
     * The model instance.
     *
     * @var Model
     */
    protected Model $model;

    /**
     * The cache tag.
     *
     * @var CacheTag
     */
    protected CacheTag $cacheTag;

    /**
     * The cache ttl.
     *
     * @var CacheTTL
     */
    protected CacheTTL $ttl = CacheTTL::DEFAULT;

    /**
     * The cache repository instance.
     *
     * @var CacheRepository
     */
    protected CacheRepository $cacheRepository;

    /**
     * The construct.
     */
    public function __construct(?string $modelNamespace = null)
    {
        $this->model = new ($modelNamespace ?? $this->modelNamespace)();

        $this->cacheRepository = new CacheRepository($this->cacheTag, $this, $this->ttl);
    }

    /**
     * Gets the primary key.
     *
     * @return string
     */
    protected function getKeyName(): string
    {
        return $this->model->getKeyName();
    }

    /**
     * Determines whether the table exists in a database.
     *
     * @return bool
     */
    public function tableExists(): bool
    {
        return Schema::hasTable($this->model->getTable());
    }

    /**
     * Maps each model of the specified collection to the specified data.
     *
     * @param Collection                       $collection
     * @param class-string<Data> $dataNamespace
     *
     * @return \Illuminate\Support\Collection
     */
    protected function map(Collection $collection, string $dataNamespace): \Illuminate\Support\Collection
    {
        return $collection->map(new MapCallback($dataNamespace));
    }

    /**
     * Creates a new instance and returns it.
     *
     * @return $this
     */
    public static function query(): static
    {
        return new static();
    }
}
