<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GenericUseCaseDetailResponseDTOSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseDetailResponseClassName;

    public $genericUseCaseDetailResponseShortName;

    public $genericUseCaseResponseDTOShortName;

    public $templatePath = 'BusinessRules/UseCases/GenericUseCaseDetailResponseDTO.php.twig';
}
