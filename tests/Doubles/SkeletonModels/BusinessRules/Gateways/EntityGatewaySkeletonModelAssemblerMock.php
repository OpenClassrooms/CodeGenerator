<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\Impl\EntityGatewaySkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class EntityGatewaySkeletonModelAssemblerMock extends EntityGatewaySkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->setPaginatedCollection(FixturesConfig::PAGINATED_COLLECTION);
    }
}
