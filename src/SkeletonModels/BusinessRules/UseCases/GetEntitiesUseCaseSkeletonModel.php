<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntitiesUseCaseSkeletonModel extends AbstractSkeletonModel
{
    public $entitiesArgument;

    public $entitiesShortName;

    public $entityGatewayArgument;

    public $entityGatewayClassname;

    public $entityGatewayShortName;

    public $entityUseCaseListItemResponseAssemblerClassName;

    public $entityUseCaseListItemResponseAssemblerShortName;

    public $getEntitiesUseCaseRequestClassName;

    public $getEntitiesUseCaseRequestShortName;

    public $paginatedCollectionClassName;

    public $paginatedCollectionShortName;

    public $paginatedUseCaseResponseClassName;

    public $paginatedUseCaseResponseShortName;

    public $paginationClassName;

    public $securityClassName;

    public string $templatePath = 'BusinessRules/UseCases/GetEntitiesUseCase.php.twig';

    public $useCaseClassName;

    public $useCaseRequestClassName;

    public $useCaseRequestShortName;

    public $useCaseShortName;
}
