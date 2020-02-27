<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl\GetEntitiesUseCaseTestSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class GetEntitiesUseCaseTestSkeletonModelAssemblerMock extends GetEntitiesUseCaseTestSkeletonModelBuilderImpl
{
    public function __construct()
    {
        $this->setPagination(FixturesConfig::PAGINATION);
    }
}
