<?php

namespace App\Http\API\Schedules;


use App\Data\Schedules\ScheduleDataAttributes;
use App\Data\ViewSchedules\ViewScheduleDataOptions;
use App\Http\API\APIController;
use App\Repositories\SchedulesRepository;
use App\Repositories\ViewSchedulesRepository;
use App\Standards\Api\Classes\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 * Provides logic actions for Schedules.
 */
class SchedulesController extends APIController
{
    /**
     * Gets a list of Schedules.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        try
        {
            $options = new ViewScheduleDataOptions($request->all());

            $records = ViewSchedulesRepository::query()->records($options);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());

            return ApiResponse::fromArray([ 'message' => 'Invalid data', 'status' => 400 ]);
        }

        return ApiResponse::fromArray([ 'message' => '', 'data' => $records->toArray() ]);
    }

    /**
     * Writes a new Schedule.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function write(Request $request): JsonResponse
    {
        try
        {
            $attributes = new ScheduleDataAttributes($request->json()->all());

            $record = SchedulesRepository::query()->write($attributes);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());

            return ApiResponse::fromArray([ 'message' => 'Invalid data', 'status' => 400 ]);
        }

        return ApiResponse::fromArray([ 'message' => '', 'record' => $record->toArray() ]);
    }
}
