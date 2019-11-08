<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntitySkeletonModel extends AbstractSkeletonModel
{
    public $createEntityRequestArgument;

    public $createEntityRequestClassName;

    public $createEntityRequestMethods;

    public $createEntityRequestShortName;

    public $entityArgument;

    public $entityClassName;

    public $entityDetailResponseAssemblerArgument;

    public $entityDetailResponseAssemblerClassName;

    public $entityDetailResponseAssemblerShortName;

    public $entityDetailResponseClassName;

    public $entityDetailResponseShortName;

    public $entityFactoryArgument;

    public $entityFactoryClassName;

    public $entityFactoryShortName;

    public $entityGatewayArgument;

    public $entityGatewayClassName;

    public $entityGatewayShortName;

    public $entityShortName;

    public $templatePath = 'BusinessRules/UseCases/CreateEntity.php.twig';

    public $transactionClassName;

    public $useCaseClassName;

    public $useCaseRequestClassName;
}
