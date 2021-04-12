<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntitiesUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public $entitiesArgument;

    public $entitiesShortName;

    public $entityGatewayShortName;

    public array $entityStubClassNames = [];

    public array $entityStubShortNames = [];

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

    public string $templatePath = 'Tests/BusinessRules/UseCases/GetEntitiesUseCaseTest.php.twig';

    public $paginationClassName;

    public $useCaseListItemResponseAssemblerMockClassName;

    public $useCaseListItemResponseAssemblerMockShortName;

    public $useCaseListItemResponseAssemblerShortName;

    public $useCaseListItemResponsesShortName;

    public array $useCaseListItemResponseStubClassNames = [];

    public array $useCaseListItemResponseStubShortNames = [];

    public $useCaseListItemResponseTestCaseClassName;

    public $useCaseListItemResponseTestCaseShortName;
}
