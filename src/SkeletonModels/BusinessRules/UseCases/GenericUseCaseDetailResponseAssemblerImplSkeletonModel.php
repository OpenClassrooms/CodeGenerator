<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GenericUseCaseDetailResponseAssemblerImplSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityMethods;

    public $entityShortName;

    public $genericUseCaseDetailResponseAssemblerClassName;

    public $genericUseCaseDetailResponseAssemblerImplClassName;

    public $genericUseCaseDetailResponseAssemblerImplShortName;

    public $genericUseCaseDetailResponseAssemblerShortName;

    public $genericUseCaseDetailResponseClassName;

    public $genericUseCaseDetailResponseDTOShortName;

    public $genericUseCaseDetailResponseShortName;

    public $genericUseCaseResponseTrait;

    public $templatePath = 'BusinessRules/UseCases/GenericUseCaseDetailResponseAssemblerImpl.php.twig';
}
