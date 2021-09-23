<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityUseCaseRequestSkeletonModel extends AbstractSkeletonModel
{
    public $useCaseRequestClassName;

    public $useCaseRequestShortName;

    public string $createRequestTraitClassName;

    public string $createRequestTraitShortName;

    public string $entityUseCaseCommonRequestTraitShortName;

    public string $templatePath = 'BusinessRules/UseCases/Request/CreateEntityUseCaseRequest.php.twig';
}
