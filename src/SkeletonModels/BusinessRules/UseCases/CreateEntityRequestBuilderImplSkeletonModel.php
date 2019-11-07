<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityRequestBuilderImplSkeletonModel extends AbstractSkeletonModel
{
    public $createEntityRequestBuilderClassName;

    public $createEntityRequestBuilderShortName;

    public $createEntityRequestClassName;

    public $createEntityRequestDTOShortName;

    public $createEntityRequestShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Request/CreateEntityRequestBuilderImpl.php.twig';
}
