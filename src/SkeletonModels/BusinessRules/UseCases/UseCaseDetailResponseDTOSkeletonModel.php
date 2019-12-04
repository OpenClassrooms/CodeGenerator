<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseDetailResponseDTOSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'BusinessRules/UseCases/DTO/Response/UseCaseDetailResponseDTO.php.twig';

    public $useCaseDetailResponseClassName;

    public $useCaseDetailResponseShortName;

    public $useCaseResponseCommonFieldTraitShortName;
}
