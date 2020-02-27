<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\App\Repository;

use OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\Impl\EntityRepositorySkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class EntityRepositorySkeletonModelAssemblerMock extends EntityRepositorySkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->setPaginatedCollectionFactoryClassName(FixturesConfig::PAGINATED_COLLECTION_FACTORY);
    }
}
