<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntitiesUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public string $entitiesArgument;

    public string $entitiesShortName;

    public string $entityGatewayShortName;

    public array $entityStubClassNames = [];

    public array $entityStubShortNames = [];

    public string $getEntitiesUseCaseClassName;

    public string $getEntitiesUseCaseRequestBuilderImplClassName;

    public string $getEntitiesUseCaseRequestBuilderImplShortName;

    public string $getEntitiesUseCaseRequestClassName;

    public string $getEntitiesUseCaseRequestDTOClassName;

    public string $getEntitiesUseCaseRequestDTOShortName;

    public string $getEntitiesUseCaseRequestShortName;

    public string $getEntitiesUseCaseShortName;

    public string $inMemoryEntityGatewayClassName;

    public string $inMemoryEntityGatewayShortName;

    public string $templatePath = 'Tests/BusinessRules/UseCases/GetEntitiesUseCaseTest.php.twig';

    public string $paginationClassName;

    public string $useCaseListItemResponseAssemblerMockClassName;

    public string $useCaseListItemResponseAssemblerMockShortName;

    public string $useCaseListItemResponseAssemblerShortName;

    public string $useCaseListItemResponsesShortName;

    public array $useCaseListItemResponseStubClassNames = [];

    public array $useCaseListItemResponseStubShortNames = [];

    public string $useCaseListItemResponseTestCaseClassName;

    public string $useCaseListItemResponseTestCaseShortName;
}
