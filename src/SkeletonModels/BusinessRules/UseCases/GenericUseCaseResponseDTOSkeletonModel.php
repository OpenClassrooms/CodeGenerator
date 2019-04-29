<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GenericUseCaseResponseDTOSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseResponseClassName;

    public $genericUseCaseResponseShortName;

    public $templatePath = 'BusinessRules/UseCases/GenericUseCaseResponseDTO.php.twig';
}
