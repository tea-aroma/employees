<?php

namespace App\Http\API\Classifiers;


use App\Data\Classifiers\ClassifierDataOptions;
use App\Http\API\APIController;
use App\Repositories\ClassifierRepository;
use App\Standards\Api\Classes\ApiResponse;
use App\Standards\Enums\ClassifierModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 * Provides logic actions for Classifiers.
 */
class ClassifiersController extends APIController
{
    /**
     * Gets a list of Classifier.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        try
        {
            $options = new ClassifierDataOptions($request->all());

            $records = ClassifierRepository::forModel(ClassifierModel::fromName($options->classifier_model)->value)->records($options);
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage(), $e->getTrace());

            return ApiResponse::fromArray([ 'message' => 'Invalid data.', 'status' => 400 ]);
        }

        return ApiResponse::fromArray([ 'message' => '', 'data' => $records->toArray() ]);
    }
}
