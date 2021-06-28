<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntitiesUseCaseRequestBuilderImplSkeletonModel extends AbstractSkeletonModel
{
    public $getEntitiesUseCaseRequestBuilderClassName;

    public $getEntitiesUseCaseRequestBuilderShortName;

    public $getEntitiesUseCaseRequestClassName;

    public $getEntitiesUseCaseRequestDTOShortName;

    public $getEntitiesUseCaseRequestShortName;

    public string $templatePath = 'BusinessRules/UseCases/DTO/Request/GetEntitiesUseCaseRequestBuilderImpl.php.twig';
}
