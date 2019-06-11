<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GetEntitiesUseCaseSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseSkeletonModelAssemblerMock extends GetEntitiesUseCaseSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->useCaseClassName = FixturesConfig::USE_CASE_CLASSNAME;
        $this->useCaseRequestClassName = FixturesConfig::USE_CASE_REQUEST_CLASSNAME;
        $this->pagination = FixturesConfig::PAGINATION;
        $this->paginatedCollection = FixturesConfig::PAGINATED_COLLECTION;
        $this->paginatedUseCaseResponse = FixturesConfig::PAGINATED_USE_CASE_RESPONSE;
        $this->paginatedUseCaseResponseBuilder = FixturesConfig::PAGINATED_USE_CASE_RESPONSE_BUILDER;
    }
}
