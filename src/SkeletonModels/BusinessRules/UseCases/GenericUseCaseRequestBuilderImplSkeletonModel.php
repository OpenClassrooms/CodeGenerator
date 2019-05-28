<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GenericUseCaseRequestBuilderImplSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseRequestBuilderClassName;

    public $genericUseCaseRequestBuilderShortName;

    public $genericUseCaseRequestClassName;

    public $genericUseCaseRequestDTOShortName;

    public $genericUseCaseRequestShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Request/GenericUseCaseRequestBuilderImpl.php.twig';

    public $useCaseClassName;
}
