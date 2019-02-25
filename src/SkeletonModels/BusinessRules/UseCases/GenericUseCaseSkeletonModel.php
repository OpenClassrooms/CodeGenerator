<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class GenericUseCaseSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'BusinessRules/UseCases/GenericUseCase.php.twig';

    public $useCaseClassName;

    public $useCaseRequestClassName;

    public $useCaseRequestShortName;

    public $useCaseRequestArgument;
}
