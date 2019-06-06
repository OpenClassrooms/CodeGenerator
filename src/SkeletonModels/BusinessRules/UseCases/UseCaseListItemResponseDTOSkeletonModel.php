<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class UseCaseListItemResponseDTOSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'BusinessRules/UseCases/UseCaseListItemResponseDTO.php.twig';

    public $useCaseListItemResponseClassName;

    public $useCaseListItemResponseShortName;

    public $useCaseResponseDTOShortName;
}
