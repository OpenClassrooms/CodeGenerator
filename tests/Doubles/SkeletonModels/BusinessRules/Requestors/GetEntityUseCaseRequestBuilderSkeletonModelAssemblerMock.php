<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl\GetEntityUseCaseRequestBuilderSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GetEntityUseCaseRequestBuilderSkeletonModelAssemblerMock extends GetEntityUseCaseRequestBuilderSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->useCaseClassName = FixturesConfig::USE_CASE_NAMESPACE;
        $this->useCaseRequestClassName = FixturesConfig::USE_CASE_REQUEST_NAMESPACE;
    }
}
