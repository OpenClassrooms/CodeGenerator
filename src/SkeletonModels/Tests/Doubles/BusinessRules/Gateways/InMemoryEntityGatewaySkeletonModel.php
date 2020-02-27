<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class InMemoryEntityGatewaySkeletonModel extends AbstractSkeletonModel
{
    public $entityArgument;

    public $entityClassName;

    public $entityGatewayClassName;

    public $entityGatewayShortName;

    public $entityIdArgument;

    public $entityNotFoundExceptionClassName;

    public $entityNotFoundExceptionShortName;

    public $entityShortName;

    public $entityUtilClassName;

    public $paginatedCollectionBuilderImplClassName;

    public $paginatedCollectionBuilderImplShortName;

    public $pluralEntityShortName;

    public $templatePath = 'Tests/Doubles/BusinessRules/Gateways/InMemoryEntityGateway.php.twig';
}
