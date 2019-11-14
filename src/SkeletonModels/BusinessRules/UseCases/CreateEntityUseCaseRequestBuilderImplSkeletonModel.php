<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityUseCaseRequestBuilderImplSkeletonModel extends AbstractSkeletonModel
{
    public $createEntityRequestBuilderClassName;

    public $createEntityRequestBuilderShortName;

    public $createEntityRequestClassName;

    public $createEntityRequestDTOShortName;

    public $createEntityRequestShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Request/CreateEntityUseCaseRequestBuilderImpl.php.twig';
}
