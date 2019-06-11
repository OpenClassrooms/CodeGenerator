<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\GenerateGenerator;

use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\Impl\GenerateGeneratorGeneratorSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenerateGeneratorGeneratorSkeletonModelAssemblerMock extends GenerateGeneratorGeneratorSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->setBaseNamespace(FixturesConfig::BASE_NAMESPACE_SELF_GENERATOR);
    }
}
