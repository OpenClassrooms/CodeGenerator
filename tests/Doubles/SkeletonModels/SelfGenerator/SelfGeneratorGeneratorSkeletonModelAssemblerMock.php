<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\SelfGenerator;

use OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\Impl\SelfGeneratorGeneratorSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class SelfGeneratorGeneratorSkeletonModelAssemblerMock extends SelfGeneratorGeneratorSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->baseNamespace = FixturesConfig::BASE_NAMESPACE_SELF_GENERATOR;
    }
}
