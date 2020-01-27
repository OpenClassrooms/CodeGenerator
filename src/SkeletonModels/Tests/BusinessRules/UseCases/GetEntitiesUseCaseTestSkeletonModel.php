<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntitiesUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public $entitiesArgument;

    public $entitiesShortName;

    public $entityGatewayShortName;

    public $entityStubClassNames = [];

    public $entityStubShortNames = [];

    public $getEntitiesUseCaseClassName;

    public $getEntitiesUseCaseRequestBuilderImplClassName;

    public $getEntitiesUseCaseRequestBuilderImplShortName;

    public $getEntitiesUseCaseRequestClassName;

    public $getEntitiesUseCaseRequestDTOClassName;

    public $getEntitiesUseCaseRequestDTOShortName;

    public $getEntitiesUseCaseRequestShortName;

    public $getEntitiesUseCaseShortName;

    public $inMemoryEntityGatewayClassName;

    public $inMemoryEntityGatewayShortName;

    public $templatePath = 'Tests/BusinessRules/UseCases/GetEntitiesUseCaseTest.php.twig';

    public $useCaseListItemResponseAssemblerMockClassName;

    public $useCaseListItemResponseAssemblerMockShortName;

    public $useCaseListItemResponseAssemblerShortName;

    public $useCaseListItemResponsesShortName;

    public $useCaseListItemResponseStubClassNames = [];

    public $useCaseListItemResponseStubShortNames = [];

    public $useCaseListItemResponseTestCaseClassName;

    public $useCaseListItemResponseTestCaseShortName;
}
