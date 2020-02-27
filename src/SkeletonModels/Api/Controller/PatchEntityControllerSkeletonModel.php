<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class PatchEntityControllerSkeletonModel extends AbstractSkeletonModel
{
    public $abstractControllerClassName;

    public $abstractControllerShortName;

    public $editEntityUseCaseClassName;

    public $editEntityUseCaseRequestBuilderArgument;

    public $editEntityUseCaseRequestBuilderClassName;

    public $editEntityUseCaseRequestBuilderShortName;

    public $editEntityUseCaseRequestClassName;

    public $editEntityUseCaseRequestShortName;

    public $editEntityUseCaseShortName;

    public $entityIdArgument;

    public $entityNotFoundExceptionClassName;

    public $entityNotFoundExceptionShortName;

    public $entityUseCaseDetailResponseClassName;

    public $entityUseCaseDetailResponseShortName;

    public $entityViewModelDetailAssemblerArgument;

    public $entityViewModelDetailAssemblerClassName;

    public $entityViewModelDetailAssemblerShortName;

    public $entityViewModelDetailClassName;

    public $entityViewModelDetailShortName;

    public $patchEntityModelClassName;

    public $patchEntityModelFields;

    public $patchEntityModelShortName;

    public $route;

    public $updateEntityMethod;

    public $withEntityIdMethod;

    public $templatePath = 'Api/Controller/PatchEntityController.php.twig';
}
