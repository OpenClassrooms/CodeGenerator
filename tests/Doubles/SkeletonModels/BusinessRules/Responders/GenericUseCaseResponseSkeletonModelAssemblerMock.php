<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl\GenericUseCaseResponseSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseResponseSkeletonModelAssemblerMock extends GenericUseCaseResponseSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->useCaseResponse = FixturesConfig::USE_CASE_RESPONSE;
    }
}
