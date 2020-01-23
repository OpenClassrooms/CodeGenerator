<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\Impl\PatchEntityControllerSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class PatchEntityControllerSkeletonModelBuilderMock extends PatchEntityControllerSkeletonModelBuilderImpl
{
    public function __construct()
    {
        $this->abstractControllerClassName = FixturesConfig::ABSTRACT_CONTROLLER;
    }
}
