<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\Impl\GetEntityControllerSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class GetEntityControllerSkeletonModelBuilderMock extends GetEntityControllerSkeletonModelBuilderImpl
{
    public function __construct()
    {
        $this->setAbstractControllerClassName(FixturesConfig::ABSTRACT_CONTROLLER);
    }
}
