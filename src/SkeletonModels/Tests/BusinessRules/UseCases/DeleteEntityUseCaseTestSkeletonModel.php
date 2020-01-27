<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class DeleteEntityUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public $deleteEntityUseCaseClassName;

    public $deleteEntityUseCaseMethod;

    public $deleteEntityUseCaseShortName;

    public $deleteEntityUseCaseRequestBuilderImplClassName;

    public $deleteEntityUseCaseRequestBuilderImplShortName;

    public $deleteEntityUseCaseRequestClassName;

    public $deleteEntityUseCaseRequestShortName;

    public $deleteEntityUseCaseRequestDTOClassName;

    public $deleteEntityUseCaseRequestDTOShortName;

    public $entityNotFoundExceptionClassName;

    public $entityStubClassName;

    public $entityStubsArgument;

    public $entityStubShortName;

    public $inMemoryEntityGatewayClassName;

    public $inMemoryEntityGatewayShortName;

    public $withEntityIdMethod;

    public $entitiesArgument;

    public $entityArgument;

    public $entityIdArgument;

    public $templatePath = 'Tests/BusinessRules/UseCases/DeleteEntityUseCaseTest.php.twig';
}
