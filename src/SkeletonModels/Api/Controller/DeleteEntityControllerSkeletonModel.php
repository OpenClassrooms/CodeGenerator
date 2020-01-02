<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class DeleteEntityControllerSkeletonModel extends AbstractSkeletonModel
{
    public $deleteEntityClassName;

    public $deleteEntityShortName;

    public $deleteEntityMethod;

    public $deleteEntityRequestBuilderArgument;

    public $deleteEntityRequestBuilderClassName;

    public $deleteEntityRequestBuilderShortName;

    public $entityIdArgument;

    public $entityNotFoundExceptionClassName;

    public $entityNotFoundExceptionShortName;

    public $withEntityIdMethod;

    public $templatePath = 'Api/Controller/DeleteEntityController.php.twig';
}
