<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntitiesControllerSkeletonModel extends AbstractSkeletonModel
{
    public string $abstractControllerClassName;

    public string $abstractControllerShortName;

    public string $collectionInformationClassName;

    public string $collectionInformationShortName;

    public string $entitiesArgument;

    public string $entityViewModelListItemAssemblerArgument;

    public string $entityViewModelListItemAssemblerClassName;

    public string $entityViewModelListItemAssemblerShortName;

    public string $entityViewModelListItemClassName;

    public string $entityViewModelListItemShortName;

    public string $getEntitiesMethod;

    public string $getEntitiesUseCaseClassName;

    public string $getEntitiesUseCaseRequestBuilderArgument;

    public string $getEntitiesUseCaseRequestBuilderClassName;

    public string $getEntitiesUseCaseRequestBuilderShortName;

    public string $getEntitiesUseCaseShortName;

    public string $paginatedUseCaseResponseClassName;

    public string $paginatedUseCaseResponseShortName;

    public string $routeAnnotation;

    public string $templatePath = 'Api/Controller/GetEntitiesController.php.twig';
}
