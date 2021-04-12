<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class PatchEntityControllerSkeletonModel extends AbstractSkeletonModel
{
    public string $abstractControllerClassName;

    public string $abstractControllerShortName;

    public string $editEntityUseCaseClassName;

    public string $editEntityUseCaseRequestBuilderArgument;

    public string $editEntityUseCaseRequestBuilderClassName;

    public string $editEntityUseCaseRequestBuilderShortName;

    public string $editEntityUseCaseRequestClassName;

    public string $editEntityUseCaseRequestShortName;

    public string $editEntityUseCaseShortName;

    public string $entityIdArgument;

    public string $entityNotFoundExceptionClassName;

    public string $entityNotFoundExceptionShortName;

    public string $entityUseCaseDetailResponseClassName;

    public string $entityUseCaseDetailResponseShortName;

    public string $entityViewModelDetailAssemblerArgument;

    public string $entityViewModelDetailAssemblerClassName;

    public string $entityViewModelDetailAssemblerShortName;

    public string $entityViewModelDetailClassName;

    public string $entityViewModelDetailShortName;

    public string $patchEntityModelClassName;

    public array $patchEntityModelFields;

    public string $patchEntityModelShortName;

    public string $routeAnnotation;

    public string $updateEntityMethod;

    public string $withEntityIdMethod;

    public string $templatePath = 'Api/Controller/PatchEntityController.php.twig';
}
