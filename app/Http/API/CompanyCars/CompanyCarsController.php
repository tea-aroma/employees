<?php

namespace App\Http\API\CompanyCars;


use App\Data\CompanyCars\CompanyCarDataOptions;
use App\Http\API\APIController;
use App\Repositories\CompanyCarsRepository;
use App\Standards\Api\Classes\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 * Provides logic actions for Company Cars.
 */
class CompanyCarsController extends APIController
{
    /**
     * Gets a list of Company Cars.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        try
        {
            $options = new CompanyCarDataOptions($request->all());

            $records = CompanyCarsRepository::query()->records($options);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage(), $e->getTrace());

            return ApiResponse::fromArray([ 'message' => 'Invalid data', 'data' => null, 'status' => 400 ]);
        }

        return ApiResponse::fromArray([ 'message' => '', 'data' => $records->toArray() ]);
    }
}
