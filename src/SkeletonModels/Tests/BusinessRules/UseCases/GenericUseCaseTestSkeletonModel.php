<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GenericUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public string $genericUseCaseClassName;

    public string $genericUseCaseRequestClassName;

    public string $genericUseCaseRequestShortName;

    public string $genericUseCaseShortName;

    public string $genericUseCaseTestMethod;

    public string $templatePath = 'Tests/BusinessRules/UseCases/GenericUseCaseTest.php.twig';
}
