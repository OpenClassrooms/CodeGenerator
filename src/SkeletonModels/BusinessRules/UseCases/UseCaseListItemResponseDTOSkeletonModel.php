<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseListItemResponseDTOSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'BusinessRules/UseCases/DTO/Response/UseCaseListItemResponseDTO.php.twig';

    public $useCaseListItemResponseClassName;

    public $useCaseListItemResponseShortName;

    public $useCaseResponseCommonFieldTraitShortName;
}
