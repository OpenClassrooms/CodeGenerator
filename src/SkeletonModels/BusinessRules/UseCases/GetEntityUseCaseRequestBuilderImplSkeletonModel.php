<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntityUseCaseRequestBuilderImplSkeletonModel extends AbstractSkeletonModel
{
    public $entityShortName;

    public $getEntityUseCaseRequestBuilderClassName;

    public $getEntityUseCaseRequestBuilderShortName;

    public $getEntityUseCaseRequestClassName;

    public $getEntityUseCaseRequestDTOShortName;

    public $getEntityUseCaseRequestShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Request/GetEntityUseCaseRequestBuilderImpl.php.twig';
}
