<?php

namespace App\Http\API\Employees;


use App\Data\ViewEmployees\ViewEmployeeDataOptions;
use App\Http\API\APIController;
use App\Repositories\ViewEmployeesRepository;
use App\Standards\Api\Classes\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


/**
 * Provides logic actions for Employees.
 */
class EmployeesController extends APIController
{
    /**
     * Gets a list of employees.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $options = new ViewEmployeeDataOptions($request->all());

        $records = ViewEmployeesRepository::query()->records($options);

        return ApiResponse::fromArray([ 'message' => '', 'data' => $records->toArray() ]);
    }
}
