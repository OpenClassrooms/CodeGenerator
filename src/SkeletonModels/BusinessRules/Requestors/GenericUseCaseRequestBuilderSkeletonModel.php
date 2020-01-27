<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GenericUseCaseRequestBuilderSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseRequestBuilderShortName;

    public $genericUseCaseRequestShortName;

    public $templatePath = 'BusinessRules/Requestors/GenericUseCaseRequestBuilder.php.twig';

    public $useCaseRequestClassName;

    public $useCaseRequestShortName;
}
