<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl\GetEntitiesUseCaseRequestSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseRequestSkeletonModelAssemblerMock extends GetEntitiesUseCaseRequestSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->useCaseRequestClassName = FixturesConfig::USE_CASE_REQUEST_CLASSNAME;
    }
}
