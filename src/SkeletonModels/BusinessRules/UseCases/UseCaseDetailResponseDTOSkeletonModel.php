<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseDetailResponseDTOSkeletonModel extends AbstractSkeletonModel
{
    public string $templatePath = 'BusinessRules/UseCases/DTO/Response/UseCaseDetailResponseDTO.php.twig';

    public string $useCaseDetailResponseClassName;

    public string $useCaseDetailResponseShortName;

    public string $useCaseResponseCommonFieldTraitShortName;
}
