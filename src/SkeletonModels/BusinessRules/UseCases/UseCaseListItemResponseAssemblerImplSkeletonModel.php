<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseListItemResponseAssemblerImplSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityMethods;

    public $entityShortName;

    public $paginatedCollectionClassName;

    public $paginatedCollectionShortName;

    public $paginatedUseCaseResponseBuilderArgument;

    public $paginatedUseCaseResponseBuilderClassName;

    public $paginatedUseCaseResponseBuilderShortName;

    public $paginatedUseCaseResponseClassName;

    public $paginatedUseCaseResponseShortName;

    public string $templatePath = 'BusinessRules/UseCases/DTO/Response/UseCaseListItemResponseAssemblerImpl.php.twig';

    public $useCaseListItemResponseAssemblerClassName;

    public $useCaseListItemResponseAssemblerShortName;

    public $useCaseListItemResponseClassName;

    public $useCaseListItemResponseDTOShortName;

    public $useCaseListItemResponseShortName;

    public $useCaseResponseAssemblerTraitShortName;
}
