<?php

namespace App\Repositories;


use App\Data\CompanyCars\AvailableCompanyCarData;
use App\Data\CompanyCars\CompanyCarDataOptions;
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
use Illuminate\Support\Facades\Log;


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
     * @return Collection<ViewScheduleData|AvailableCompanyCarData>
     */
    public function records(OptionsInterface $options): Collection
    {
        if (!is_a($options, ViewScheduleDataOptions::class))
        {
            throw new \LogicException(ErrorMessage::INVALID_ATTRIBUTES->format($options::class, ViewScheduleDataOptions::class));
        }

        $this->cacheRepository->flush();

        return $this->cacheRepository->remember($options->toSha512(), function () use ($options)
        {
            $builder = $this->model->newQuery();

            $companyCarsOptions = new CompanyCarDataOptions($options->toArray());

            if (isset($options->type) && $options->type === 1 && isset($companyCarsOptions->employee_id) && isset($companyCarsOptions->start_date) && isset($companyCarsOptions->end_date))
            {
                $companyCarsOptions->target_employee_id = $options->employee_id;

                Log::info(json_encode($companyCarsOptions->toArray()));

                $builder = CompanyCarsRepository::query()->getAvailableBuilder($companyCarsOptions);

                return AvailableCompanyCarData::map($builder->get(), false);
            }
            else
            {
                if (isset($options->employee_id))
                {
                    $builder->where('employee_id', '=', $options->employee_id);
                }

                if (isset($options->start_date))
                {
                    $builder->whereDate('start_date', '>=', $options->start_date);
                }

                if (isset($options->end_date))
                {
                    $builder->whereDate('end_date', '<=', $options->end_date);
                }
            }

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
