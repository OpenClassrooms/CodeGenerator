<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl\UseCaseResponseSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class UseCaseResponseSkeletonModelAssemblerMock extends UseCaseResponseSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->setUseCaseResponse(FixturesConfig::USE_CASE_RESPONSE);
    }
}
