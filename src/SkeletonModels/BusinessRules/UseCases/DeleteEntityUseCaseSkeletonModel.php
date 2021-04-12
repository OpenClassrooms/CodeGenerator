<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class DeleteEntityUseCaseSkeletonModel extends AbstractSkeletonModel
{
    public $deleteEntityUseCaseArgument;

    public $deleteEntityUseCaseRequestClassName;

    public $deleteEntityUseCaseRequestShortName;

    public $entityArgument;

    public $entityClassName;

    public $entityGatewayArgument;

    public $entityGatewayClassName;

    public $entityGatewayShortName;

    public $entityIdArgument;

    public $entityIdMethod;

    public $entityShortName;

    public $entityNotFoundExceptionClassName;

    public $getEntityIdMethod;

    public $securityClassName;

    public string $templatePath = 'BusinessRules/UseCases/DeleteEntityUseCase.php.twig';

    public $transactionClassName;

    public $useCaseClassName;

    public $useCaseRequestClassName;
}
