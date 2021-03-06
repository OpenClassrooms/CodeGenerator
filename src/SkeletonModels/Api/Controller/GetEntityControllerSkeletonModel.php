<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntityControllerSkeletonModel extends AbstractSkeletonModel
{
    public $abstractControllerClassName;

    public $abstractControllerShortName;

    public $entityArgument;

    public $entityIdArgument;

    public $entityNotFoundExceptionArgument;

    public $entityNotFoundExceptionClassName;

    public $entityNotFoundExceptionShortName;

    public $entityUseCaseDetailResponseClassName;

    public $entityUseCaseDetailResponseShortName;

    public $entityViewModelDetailAssemblerClassName;

    public $entityViewModelClassName;

    public $entityViewModelDetailAssemblerArgument;

    public $entityViewModelDetailAssemblerShortName;

    public $entityViewModelShortName;

    public $getEntityMethod;

    public $getEntityUseCaseClassName;

    public $getEntityUseCaseShortName;

    public $getEntityUseCaseRequestBuilderArgument;

    public $getEntityUseCaseRequestBuilderClassName;

    public $getEntityUseCaseRequestBuilderShortName;

    public $routeAnnotation;

    public $withEntityIdMethod;

    public $templatePath = 'Api/Controller/GetEntityController.php.twig';
}
