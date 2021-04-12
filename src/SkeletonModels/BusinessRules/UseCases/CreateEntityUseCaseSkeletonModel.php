<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityUseCaseSkeletonModel extends AbstractSkeletonModel
{
    public string $createEntityUseCaseRequestArgument;

    public string $createEntityUseCaseRequestClassName;

    public string $createEntityUseCaseRequestShortName;

    public string $entityArgument;

    public string $entityClassName;

    public string $entityCommonHydratorTraitShortName;

    public string $entityFactoryArgument;

    public string $entityFactoryClassName;

    public string $entityFactoryShortName;

    public string $entityGatewayArgument;

    public string $entityGatewayClassName;

    public string $entityGatewayShortName;

    public string $entityShortName;

    public string $entityUseCaseDetailResponseAssemblerArgument;

    public string $entityUseCaseDetailResponseAssemblerClassName;

    public string $entityUseCaseDetailResponseAssemblerShortName;

    public string $entityUseCaseDetailResponseClassName;

    public string $entityUseCaseDetailResponseShortName;

    public string $securityClassName;

    public string $templatePath = 'BusinessRules/UseCases/CreateEntityUseCase.php.twig';

    public string $transactionClassName;

    public string $useCaseClassName;

    public string $useCaseRequestClassName;
}
