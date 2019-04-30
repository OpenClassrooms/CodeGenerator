<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GenericUseCaseListItemResponseAssemblerImplSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseAssemblerImplSkeletonModelAssemblerMock extends GenericUseCaseListItemResponseAssemblerImplSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->paginatedCollection = FixturesConfig::PAGINATED_COLLECTION;
        $this->paginatedUseCaseResponse = FixturesConfig::PAGINATED_USE_CASE_RESPONSE;
        $this->paginatedUseCaseResponseBuilder = FixturesConfig::PAGINATED_USE_CASE_RESPONSE_BUILDER;
    }
}
