<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class PostEntityControllerSkeletonModel extends AbstractSkeletonModel
{
    public $abstractControllerClassName;

    public $abstractControllerShortName;

    public $createEntityMethod;

    public $createEntityUseCaseShortName;

    public $createEntityUseCaseClassName;

    public $createEntityUseCaseRequestBuilderArgument;

    public $createEntityUseCaseRequestBuilderClassName;

    public $createEntityUseCaseRequestBuilderShortName;

    public $entityIdArgument;

    public $entityUseCaseDetailResponseClassName;

    public $entityUseCaseDetailResponseShortName;

    public $entityViewModelDetailAssemblerArgument;

    public $entityViewModelDetailAssemblerClassName;

    public $entityViewModelDetailAssemblerShortName;

    public $entityViewModelDetailClassName;

    public $entityViewModelDetailShortName;

    public $postEntityModelMethods;

    public $postEntityModelClassName;

    public $postEntityModelShortName;

    public $routeAnnotation;

    public $routeName;

    public $useCarbon;

    public $templatePath = 'Api/Controller/PostEntityController.php.twig';
}
