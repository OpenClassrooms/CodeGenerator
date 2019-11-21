<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityUseCaseSkeletonModel extends AbstractSkeletonModel
{
    public $createEntityRequestArgument;

    public $createEntityRequestClassName;

    public $createEntityRequestMethods;

    public $createEntityRequestShortName;

    public $entityArgument;

    public $entityClassName;

    public $entityUseCaseDetailResponseAssemblerArgument;

    public $entityUseCaseDetailResponseAssemblerClassName;

    public $entityUseCaseDetailResponseAssemblerShortName;

    public $entityUseCaseDetailResponseClassName;

    public $entityUseCaseDetailResponseShortName;

    public $entityFactoryArgument;

    public $entityFactoryClassName;

    public $entityFactoryShortName;

    public $entityGatewayArgument;

    public $entityGatewayClassName;

    public $entityGatewayShortName;

    public $entityShortName;

    public $templatePath = 'BusinessRules/UseCases/CreateEntityUseCase.php.twig';

    public $transactionClassName;

    public $useCaseClassName;

    public $useCaseRequestClassName;
}
