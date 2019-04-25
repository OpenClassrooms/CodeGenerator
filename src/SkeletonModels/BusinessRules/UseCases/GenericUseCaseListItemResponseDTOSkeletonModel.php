<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GenericUseCaseListItemResponseDTOSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseListItemResponseClassName;

    public $genericUseCaseListItemResponseShortName;

    public $genericUseCaseResponseDTOShortName;

    public $templatePath = 'BusinessRules/UseCases/GenericUseCaseListItemResponseDTO.php.twig';
}
