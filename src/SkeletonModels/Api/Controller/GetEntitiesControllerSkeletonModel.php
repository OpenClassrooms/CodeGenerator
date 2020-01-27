<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntitiesControllerSkeletonModel extends AbstractSkeletonModel
{
    public $abstractControllerClassName;

    public $abstractControllerShortName;

    public $collectionInformationClassName;

    public $collectionInformationShortName;

    public $entitiesArgument;

    public $entityNotFoundExceptionClassName;

    public $entityNotFoundExceptionShortName;

    public $entityUseCaseResponseShortName;

    public $entityUseCaseResponseClassName;

    public $entityViewModelListItemAssemblerArgument;

    public $entityViewModelListItemAssemblerClassName;

    public $entityViewModelListItemAssemblerShortName;

    public $entityViewModelListItemClassName;

    public $entityViewModelListItemShortName;

    public $getEntitiesMethod;

    public $getEntitiesUseCaseClassName;

    public $getEntitiesUseCaseRequestBuilderArgument;

    public $getEntitiesUseCaseRequestBuilderClassName;

    public $getEntitiesUseCaseRequestBuilderShortName;

    public $getEntitiesUseCaseShortName;

    public $paginatedUseCaseResponseClassName;

    public $paginatedUseCaseResponseShortName;

    public $templatePath = 'Api/Controller/GetEntitiesController.php.twig';
}
