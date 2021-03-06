<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GetEntitiesUseCaseSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class GetEntitiesUseCaseSkeletonModelAssemblerMock extends GetEntitiesUseCaseSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->setUseCaseClassName(FixturesConfig::USE_CASE);
        $this->setUseCaseRequestClassName(FixturesConfig::USE_CASE_REQUEST);
        $this->setPagination(FixturesConfig::PAGINATION);
        $this->setPaginatedCollection(FixturesConfig::PAGINATED_COLLECTION);
        $this->setPaginatedUseCaseResponse(FixturesConfig::PAGINATED_USE_CASE_RESPONSE);
        $this->setPaginatedUseCaseResponseBuilder(FixturesConfig::PAGINATED_USE_CASE_RESPONSE_BUILDER);
        $this->setSecurityClassName(FixturesConfig::SECURITY);
    }
}
