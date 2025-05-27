<?php

namespace App\Standards\Data\Traits;


use App\Data\Classifiers\ClassifierData;
use App\Repositories\ClassifierRepository;
use App\Standards\Enums\ClassifierModel;


/**
 * Provides the logic for classifier relations.
 */
trait HasClassifier
{
    /**
     * Gets the classifier data by the specified type.
     *
     * @param ClassifierModel $classifier
     *
     * @return ClassifierData
     */
    public function classifier(ClassifierModel $classifier): ClassifierData
    {
        return ClassifierRepository::forModel($classifier->value)->find($this->{ $classifier->getKey() });
    }
}
