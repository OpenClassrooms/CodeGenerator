<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityUseCaseRequestBuilderImplSkeletonModel extends AbstractSkeletonModel
{
    public $createEntityUseCaseRequestBuilderClassName;

    public $createEntityUseCaseRequestBuilderShortName;

    public $createEntityUseCaseRequestClassName;

    public $createEntityUseCaseRequestDTOShortName;

    public $createEntityUseCaseRequestShortName;

    public string $templatePath = 'BusinessRules/UseCases/DTO/Request/CreateEntityUseCaseRequestBuilderImpl.php.twig';
}
