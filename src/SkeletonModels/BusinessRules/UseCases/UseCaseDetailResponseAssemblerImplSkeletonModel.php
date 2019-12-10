<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseDetailResponseAssemblerImplSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityMethods;

    public $entityShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Response/UseCaseDetailResponseAssemblerImpl.php.twig';

    public $useCaseDetailResponseAssemblerClassName;

    public $useCaseDetailResponseAssemblerImplClassName;

    public $useCaseDetailResponseAssemblerImplShortName;

    public $useCaseDetailResponseAssemblerShortName;

    public $useCaseDetailResponseClassName;

    public $useCaseDetailResponseDTOShortName;

    public $useCaseDetailResponseShortName;

    public $useCaseResponseAssemblerTrait;
}
