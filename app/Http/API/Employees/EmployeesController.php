<?php

namespace App\Http\API\Employees;


use App\Data\ViewEmployees\ViewEmployeeDataOptions;
use App\Http\API\APIController;
use App\Repositories\ViewEmployeesRepository;
use App\Standards\Api\Classes\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 * Provides logic actions for Employees.
 */
class EmployeesController extends APIController
{
    /**
     * Gets a list of Employees.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        try
        {
            $options = new ViewEmployeeDataOptions($request->all());

            $records = ViewEmployeesRepository::query()->records($options);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage(), $e->getTrace());

            return ApiResponse::fromArray([ 'message' => 'Invalid data', 'data' => null, 'status' => 400 ]);
        }

        return ApiResponse::fromArray([ 'message' => '', 'data' => $records->toArray() ]);
    }
}
