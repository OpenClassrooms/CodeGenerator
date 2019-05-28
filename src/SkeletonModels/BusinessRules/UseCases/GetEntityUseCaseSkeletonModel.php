<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GetEntityUseCaseSkeletonModel extends AbstractSkeletonModel
{
    public $functionalEntityArgument;

    public $functionalEntityClassName;

    public $functionalEntityDetailResponseAssemblerClassName;

    public $functionalEntityDetailResponseAssemblerShortName;

    public $functionalEntityDetailResponseClassName;

    public $functionalEntityDetailResponseShortName;

    public $functionalEntityGatewayClassName;

    public $functionalEntityGatewayShortName;

    public $functionalEntityNotFoundExceptionClassName;

    public $functionalEntityResponseClassName;

    public $functionalEntityResponseShortName;

    public $functionalEntityShortName;

    public $getEntityUseCaseRequestArgument;

    public $getEntityUseCaseRequestClassName;

    public $getEntityUseCaseRequestAccessor;

    public $getEntityUseCaseRequestShortName;

    public $shortName;

    public $templatePath = 'BusinessRules/UseCases/GetEntityUseCase.php.twig';

    public $useCaseClassName;

    public $useCaseRequestArgument;

    public $useCaseRequestClassName;

    public $useCaseRequestShortName;
}
