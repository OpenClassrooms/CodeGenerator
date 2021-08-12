<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class PostEntityControllerSkeletonModel extends AbstractSkeletonModel
{
    public string $abstractControllerClassName;

    public string $abstractControllerShortName;

    public string $createEntityMethod;

    public string $createEntityUseCaseArgument;

    public string $createEntityUseCaseShortName;

    public string $createEntityUseCaseClassName;

    public string $createEntityUseCaseRequestArgument;

    public string $createEntityUseCaseRequestClassName;

    public string $createEntityUseCaseRequestShortName;

    public string $entityIdArgument;

    public string $entityUseCaseDetailResponseClassName;

    public string $entityUseCaseDetailResponseShortName;

    public string $entityViewModelDetailAssemblerArgument;

    public string $entityViewModelDetailAssemblerClassName;

    public string $entityViewModelDetailAssemblerShortName;

    public string $entityViewModelDetailClassName;

    public string $entityViewModelDetailShortName;

    public array $postEntityModelMethods;

    public string $postEntityModelClassName;

    public string $postEntityModelShortName;

    public string $routeAnnotation;

    public string $routeName;

    public bool $useCarbon;

    public string $templatePath = 'Api/Controller/PostEntityController.php.twig';
}
