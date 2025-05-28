<?php

namespace App\Repositories;


use App\Data\CompanyCars\AvailableCompanyCarData;
use App\Data\CompanyCars\CompanyCarData;
use App\Data\CompanyCars\CompanyCarDataOptions;
use App\Models\CompanyCarsModel;
use App\Standards\Data\Interfaces\OptionsInterface;
use App\Standards\Enums\CacheTag;
use App\Standards\Enums\ErrorMessage;
use App\Standards\Repositories\Abstracts\Repository;
use App\Standards\Repositories\Interfaces\FindInterface;
use App\Standards\Repositories\Interfaces\ReadInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


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
            return CompanyCarData::map($this->model->newQuery()->get());
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

    /**
     * Gets the available cars.
     *
     * @param OptionsInterface $options
     *
     * @return Collection|null
     */
    public function getAvailable(OptionsInterface $options): ?Collection
    {
        if (!is_a($options, CompanyCarDataOptions::class))
        {
            throw new \LogicException(ErrorMessage::INVALID_ATTRIBUTES->format($options::class, CompanyCarDataOptions::class));
        }

        return $this->cacheRepository->remember($options->toSha512(), function () use ($options)
        {
            if (!isset($options->target_employee_id) || !isset($options->start_date) || !isset($options->end_date))
            {
                return null;
            }

            $this->cacheRepository->flush();

            $builder = $this->getAvailableBuilder($options);

            if (isset($options->car_comfort_id))
            {
                $builder = $builder->where('car_comfort_id', $options->car_comfort_id);
            }

            if (isset($options->car_model_id))
            {
                $builder = $builder->where('car_model_id', $options->car_model_id);
            }

            return AvailableCompanyCarData::map($builder->get(), false);
        });
    }

    /**
     * Gets the builder for available cars table.
     *
     * @param OptionsInterface $options
     *
     * @return Builder
     */
    public function getAvailableBuilder(OptionsInterface $options): Builder
    {
        if (!is_a($options, CompanyCarDataOptions::class))
        {
            throw new \LogicException(ErrorMessage::INVALID_ATTRIBUTES->format($options::class, CompanyCarDataOptions::class));
        }

        $options->start_date = date("Y-m-d H:i:s", strtotime($options->start_date));

        $options->end_date = date("Y-m-d H:i:s", strtotime($options->end_date));

        DB::statement('create temporary table temp_available_company_cars as select * from f_available_company_cars(?, ?, ?)', [ $options->target_employee_id, $options->start_date, $options->end_date ]);

        return $this->model->setTable('temp_available_company_cars')->newQuery();
    }
}
