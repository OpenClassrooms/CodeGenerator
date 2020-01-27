<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntitiesUseCaseRequestDTOSkeletonModel extends AbstractSkeletonModel
{
    public $getEntitiesUseCaseRequestClassName;

    public $getEntitiesUseCaseRequestShortName;

    public $paginationClassName;

    public $paginationShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Request/GetEntitiesUseCaseRequestDTO.php.twig';
}
