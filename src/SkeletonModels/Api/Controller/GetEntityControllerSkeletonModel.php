<?php declare(strict_types=1);

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

    public $entityUseCaseResponseClassName;

    public $entityViewModelDetailAssemblerClassName;

    public $entityUseCaseResponseShortName;

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

    public $withEntityIdMethod;

    public $templatePath = 'Api/Controller/GetEntityController.php.twig';
}
