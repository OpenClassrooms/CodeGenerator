<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\GetEntitiesUseCaseRequestDTOSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseRequestDTOSkeletonModelAssemblerMock extends GetEntitiesUseCaseRequestDTOSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->setPagination(FixturesConfig::PAGINATION);
    }
}
