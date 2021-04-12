<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GenericUseCaseRequestSkeletonModel extends AbstractSkeletonModel
{
    public string $templatePath = 'BusinessRules/UseCases/Request/GenericUseCaseRequest.php.twig';

    public $useCaseRequestClassName;

    public $useCaseRequestShortName;
}
