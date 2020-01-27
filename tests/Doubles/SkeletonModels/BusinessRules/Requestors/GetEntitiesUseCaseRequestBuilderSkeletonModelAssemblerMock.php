<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl\GetEntitiesUseCaseRequestBuilderSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class GetEntitiesUseCaseRequestBuilderSkeletonModelAssemblerMock extends GetEntitiesUseCaseRequestBuilderSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->setUseCaseRequestClassName(FixturesConfig::USE_CASE_REQUEST);
    }
}
