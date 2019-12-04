<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GenericUseCaseSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseRequestClassName;

    public $genericUseCaseRequestShortName;

    public $templatePath = 'BusinessRules/UseCases/GenericUseCase.php.twig';

    public $useCaseClassName;

    public $useCaseRequestArgument;

    public $useCaseRequestClassName;

    public $useCaseRequestShortName;
}
