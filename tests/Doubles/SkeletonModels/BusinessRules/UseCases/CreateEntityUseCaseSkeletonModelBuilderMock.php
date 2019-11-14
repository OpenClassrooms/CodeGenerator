<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\CreateEntityUseCaseSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class CreateEntityUseCaseSkeletonModelBuilderMock extends CreateEntityUseCaseSkeletonModelBuilderImpl
{
    public function __construct()
    {
        $this->setTransactionClassName(FixturesConfig::TRANSACTION);
        $this->setUseCaseClassName(FixturesConfig::USE_CASE);
        $this->setUseCaseRequestClassName(FixturesConfig::USE_CASE_REQUEST);
    }
}
