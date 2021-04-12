<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntityControllerSkeletonModel extends AbstractSkeletonModel
{
    public string $abstractControllerClassName;

    public string $abstractControllerShortName;

    public string $entityArgument;

    public string $entityIdArgument;

    public string $entityNotFoundExceptionArgument;

    public string $entityNotFoundExceptionClassName;

    public string $entityNotFoundExceptionShortName;

    public string $entityUseCaseDetailResponseClassName;

    public string $entityUseCaseDetailResponseShortName;

    public string $entityViewModelDetailAssemblerClassName;

    public string $entityViewModelClassName;

    public string $entityViewModelDetailAssemblerArgument;

    public string $entityViewModelDetailAssemblerShortName;

    public string $entityViewModelShortName;

    public string $getEntityMethod;

    public string $getEntityUseCaseRequestClassName;

    public string $getEntityUseCaseRequestShortName;

    public string $getEntityUseCaseClassName;

    public string $getEntityUseCaseShortName;

    public string $routeAnnotation;

    public string $withEntityIdMethod;

    public string $templatePath = 'Api/Controller/GetEntityController.php.twig';
}
