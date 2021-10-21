<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class DeleteEntityUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public string $deleteEntityUseCaseClassName;

    public string $deleteEntityUseCaseMethod;

    public string $deleteEntityUseCaseShortName;

    public string $deleteEntityUseCaseRequestBuilderImplClassName;

    public string $deleteEntityUseCaseRequestBuilderImplShortName;

    public string $deleteEntityUseCaseRequestClassName;

    public string $deleteEntityUseCaseRequestShortName;

    public string $deleteEntityUseCaseRequestDTOClassName;

    public string $deleteEntityUseCaseRequestDTOShortName;

    public string $entityNotFoundExceptionClassName;

    public string $entityNotFoundExceptionShortName;

    public string $entityStubClassName;

    public string $entityStubArgument;

    public string $entityStubShortName;

    public string $inMemoryEntityGatewayClassName;

    public string $inMemoryEntityGatewayShortName;

    public string $withEntityIdMethod;

    public string $entitiesArgument;

    public string $entityArgument;

    public string $entityIdArgument;

    public string $templatePath = 'Tests/BusinessRules/UseCases/DeleteEntityUseCaseTest.php.twig';
}
