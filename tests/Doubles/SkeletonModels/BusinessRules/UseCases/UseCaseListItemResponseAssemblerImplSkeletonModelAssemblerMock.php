<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\UseCaseListItemResponseAssemblerImplSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class UseCaseListItemResponseAssemblerImplSkeletonModelAssemblerMock extends UseCaseListItemResponseAssemblerImplSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->setPaginatedCollection(FixturesConfig::PAGINATED_COLLECTION);
        $this->setPaginatedUseCaseResponse(FixturesConfig::PAGINATED_USE_CASE_RESPONSE);
        $this->setPaginatedUseCaseResponseBuilder(FixturesConfig::PAGINATED_USE_CASE_RESPONSE_BUILDER);
    }
}
