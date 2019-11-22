<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl\EditEntityUseCaseTestSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class EditEntityUseCaseTestSkeletonModelBuilderMock extends EditEntityUseCaseTestSkeletonModelBuilderImpl
{
    public function __construct()
    {
        $this->setEntityUtilClassName(FixturesConfig::ENTITY_UTIL);
    }
}
