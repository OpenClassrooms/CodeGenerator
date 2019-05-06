<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl\UseCaseListItemResponseAssemblerSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseListItemResponseAssemblerSkeletonModelAssemblerMock extends UseCaseListItemResponseAssemblerSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->pagination = FixturesConfig::PAGINATED_COLLECTION;
        $this->paginatedUseCaseResponse = FixturesConfig::PAGINATED_USE_CASE_RESPONSE;
    }
}
