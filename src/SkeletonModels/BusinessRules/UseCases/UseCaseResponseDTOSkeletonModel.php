<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class UseCaseResponseDTOSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'BusinessRules/UseCases/UseCaseResponseDTO.php.twig';

    public $useCaseResponseClassName;

    public $useCaseResponseShortName;
}
