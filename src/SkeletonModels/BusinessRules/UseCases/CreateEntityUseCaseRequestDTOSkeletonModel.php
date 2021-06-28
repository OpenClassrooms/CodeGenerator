<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityUseCaseRequestDTOSkeletonModel extends AbstractSkeletonModel
{
    public string $createEntityUseCaseRequestClassName;

    public string $createEntityUseCaseRequestShortName;

    public string $createRequestTraitClassName;

    public string $createRequestTraitShortName;

    public string $entityUseCaseCommonRequestTraitShortName;

    public string $templatePath = 'BusinessRules/UseCases/DTO/Request/CreateEntityUseCaseRequestDTO.php.twig';
}
