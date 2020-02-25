<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntityUseCaseSkeletonModel extends AbstractSkeletonModel
{
    public $entityArgument;

    public $entityClassName;

    public $entityUseCaseDetailResponseAssemblerClassName;

    public $entityUseCaseDetailResponseAssemblerShortName;

    public $entityUseCaseDetailResponseClassName;

    public $entityUseCaseDetailResponseShortName;

    public $entityGatewayArgument;

    public $entityGatewayClassName;

    public $entityGatewayShortName;

    public $entityNotFoundExceptionClassName;

    public $entityShortName;

    public $getEntityUseCaseRequestAccessor;

    public $getEntityUseCaseRequestArgument;

    public $getEntityUseCaseRequestClassName;

    public $getEntityUseCaseRequestShortName;

    public $shortName;

    public $securityClassName;

    public $templatePath = 'BusinessRules/UseCases/GetEntityUseCase.php.twig';

    public $useCaseClassName;

    public $useCaseRequestArgument;

    public $useCaseRequestClassName;

    public $useCaseRequestShortName;
}
