<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl\DeleteEntityUseCaseRequestSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class DeleteEntityUseCaseRequestSkeletonModelAssemblerMock extends DeleteEntityUseCaseRequestSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->setUseCaseRequestClassName(FixturesConfig::USE_CASE_REQUEST);
    }
}
