<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl\EditEntityUseCaseRequestSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class EditEntityUseCaseRequestSkeletonModelAssemblerMock extends EditEntityUseCaseRequestSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->setUseCaseRequestClassName(FixturesConfig::USE_CASE_REQUEST);
    }
}
