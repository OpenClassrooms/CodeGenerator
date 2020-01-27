<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GenericUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseClassName;

    public $genericUseCaseRequestBuilderImplClassName;

    public $genericUseCaseRequestBuilderImplShortName;

    public $genericUseCaseRequestClassName;

    public $genericUseCaseRequestDTOClassName;

    public $genericUseCaseRequestDTOShortName;

    public $genericUseCaseRequestShortName;

    public $genericUseCaseShortName;

    public $genericUseCaseTestMethod;

    public $templatePath = 'Tests/BusinessRules/UseCases/GenericUseCaseTest.php.twig';
}
