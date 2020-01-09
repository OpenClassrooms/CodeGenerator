<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class PostEntityControllerSkeletonModel extends AbstractSkeletonModel
{
    public $createEntityMethod;

    public $createEntityUseCaseShortName;

    public $createEntityUseCaseClassName;

    public $createEntityUseCaseRequestBuilderArgument;

    public $createEntityUseCaseRequestBuilderClassName;

    public $createEntityUseCaseRequestBuilderShortName;

    public $entityNotFoundExceptionClassName;

    public $entityNotFoundExceptionShortName;

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

    public $useCarbon;

    public $templatePath = 'Api/Controller/PostEntityController.php.twig';
}
