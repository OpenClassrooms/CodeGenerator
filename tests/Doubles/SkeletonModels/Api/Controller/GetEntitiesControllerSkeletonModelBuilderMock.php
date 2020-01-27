<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\Impl\GetEntitiesControllerSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class GetEntitiesControllerSkeletonModelBuilderMock extends GetEntitiesControllerSkeletonModelBuilderImpl
{
    public function __construct()
    {
        $this->setPaginatedUseCaseResponse(FixturesConfig::PAGINATED_USE_CASE_RESPONSE);
        $this->setAbstractControllerClassName(FixturesConfig::ABSTRACT_CONTROLLER);
        $this->setCollectionInformationClassName(FixturesConfig::COLLECTION_INFORMATION);
    }
}
