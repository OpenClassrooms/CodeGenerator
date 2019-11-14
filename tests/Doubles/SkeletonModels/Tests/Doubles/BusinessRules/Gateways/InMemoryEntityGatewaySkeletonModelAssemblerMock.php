<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Tests\Doubles\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Gateways\Impl\InMemoryEntityGatewaySkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

/**
 * @author arnaud lefevre <arnaud.lefevre@openclassrooms.com>
 */
class InMemoryEntityGatewaySkeletonModelAssemblerMock extends InMemoryEntityGatewaySkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->setEntityUtilClassName(FixturesConfig::ENTITY_UTIL);
    }
}
