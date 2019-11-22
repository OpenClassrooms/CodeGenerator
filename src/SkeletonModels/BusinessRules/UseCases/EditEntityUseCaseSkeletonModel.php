<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EditEntityUseCaseSkeletonModel extends AbstractSkeletonModel
{
    public $editEntityUseCaseRequestClassName;

    public $editEntityUseCaseRequestMethods;

    public $editEntityUseCaseRequestShortName;

    public $entityArgument;

    public $entityClassName;

    public $entityGatewayArgument;

    public $entityGatewayClassName;

    public $entityGatewayShortName;

    public $entityIdArgument;

    public $entityNotFoundExceptionClassName;

    public $entityShortName;

    public $entityUseCaseDetailResponseAssemblerArgument;

    public $entityUseCaseDetailResponseAssemblerClassName;

    public $entityUseCaseDetailResponseAssemblerShortName;

    public $entityUseCaseDetailResponseClassName;

    public $entityUseCaseDetailResponseShortName;

    public $templatePath = 'BusinessRules/UseCases/EditEntityUseCase.php.twig';

    public $transactionClassName;

    public $useCaseClassName;

    public $useCaseRequestClassName;
}
