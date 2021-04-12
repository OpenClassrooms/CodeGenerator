<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class DeleteEntityControllerSkeletonModel extends AbstractSkeletonModel
{
    public string $abstractControllerClassName;

    public string $abstractControllerShortName;

    public string $deleteEntityClassName;

    public string $deleteEntityShortName;

    public string $deleteEntityMethod;

    public string $deleteEntityRequestBuilderArgument;

    public string $deleteEntityRequestBuilderClassName;

    public string $deleteEntityRequestBuilderShortName;

    public string $entityIdArgument;

    public string $entityNotFoundExceptionClassName;

    public string $entityNotFoundExceptionShortName;

    public string $routeAnnotation;

    public string $withEntityIdMethod;

    public string $templatePath = 'Api/Controller/DeleteEntityController.php.twig';
}
