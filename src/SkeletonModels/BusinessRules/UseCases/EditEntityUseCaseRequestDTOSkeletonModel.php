<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EditEntityUseCaseRequestDTOSkeletonModel extends AbstractSkeletonModel
{
    public string $editEntityUseCaseRequestClassName;

    public string $editEntityUseCaseRequestShortName;

    public string $entityUseCaseCommonRequestTraitShortName;

    public string $templatePath = 'BusinessRules/UseCases/DTO/Request/EditEntityUseCaseRequestDTO.php.twig';
}
