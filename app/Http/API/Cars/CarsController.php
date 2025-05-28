<?php

namespace App\Http\API\Cars;


use App\Data\Cars\CarDataOptions;
use App\Http\API\APIController;
use App\Repositories\CarsRepository;
use App\Standards\Api\Classes\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 * Provides logic actions for Cars.
 */
class CarsController extends APIController
{
    /**
     * Gets a list of Cars.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        try
        {
            $options = new CarDataOptions($request->all());

            $records = CarsRepository::query()->records($options);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage(), $e->getTrace());

            return ApiResponse::fromArray([ 'message' => 'Invalid data', 'data' => null, 'status' => 400 ]);
        }

        return ApiResponse::fromArray([ 'message' => '', 'data' => $records->toArray() ]);
    }
}
