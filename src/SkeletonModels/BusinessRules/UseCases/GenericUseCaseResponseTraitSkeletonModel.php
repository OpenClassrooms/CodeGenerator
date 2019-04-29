<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GenericUseCaseResponseTraitSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityMethods;

    public $entityShortName;

    public $genericUseCaseResponseClassName;

    public $genericUseCaseResponseDTOShortName;

    public $genericUseCaseResponseShortName;

    public $templatePath = 'BusinessRules/UseCases/GenericUseCaseResponseTrait.php.twig';
}
