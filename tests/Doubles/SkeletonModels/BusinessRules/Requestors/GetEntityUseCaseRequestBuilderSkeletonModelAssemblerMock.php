<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl\GetEntityUseCaseRequestBuilderSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class GetEntityUseCaseRequestBuilderSkeletonModelAssemblerMock extends GetEntityUseCaseRequestBuilderSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->setUseCaseClassName(FixturesConfig::USE_CASE);
        $this->setUseCaseRequestClassName(FixturesConfig::USE_CASE_REQUEST);
    }
}
