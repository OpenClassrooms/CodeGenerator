<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class UseCaseDetailResponseDTOSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'BusinessRules/UseCases/UseCaseDetailResponseDTO.php.twig';

    public $useCaseDetailResponseClassName;

    public $useCaseDetailResponseShortName;

    public $useCaseResponseDTOShortName;
}
