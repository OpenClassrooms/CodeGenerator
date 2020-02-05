<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GetEntityUseCaseSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class GetEntityUseCaseSkeletonModelBuilderMock extends GetEntityUseCaseSkeletonModelBuilderImpl
{
    public function __construct()
    {
        $this->setSecurityClassName(FixturesConfig::SECURITY);
        $this->setUseCaseClassName(FixturesConfig::USE_CASE);
        $this->setUseCaseRequestClassName(
            FixturesConfig::USE_CASE_REQUEST
        );
    }
}
