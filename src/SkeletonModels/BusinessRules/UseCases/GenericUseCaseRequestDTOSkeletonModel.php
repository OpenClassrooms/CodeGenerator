<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GenericUseCaseRequestDTOSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseRequestClassName;

    public $genericUseCaseRequestShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Request/GenericUseCaseRequestDTO.php.twig';

    public $useCaseClassName;
}
