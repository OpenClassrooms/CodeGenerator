<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EntityRepositorySkeletonModel extends AbstractSkeletonModel
{
    public $entityArgument;

    public $entityClassName;

    public $entityFirstLetter;

    public $entityGatewayClassName;

    public $entityGatewayShortName;

    public $entityIdArgument;

    public $entityImplClassName;

    public $entityImplShortName;

    public $entityNotFoundExceptionClassName;

    public $entityNotFoundExceptionShortName;

    public $entityShortName;

    public $paginatedCollectionFactoryArgument;

    public $paginatedCollectionFactoryClassName;

    public $paginatedCollectionFactoryShortName;

    public $templatePath = 'App/Repository/EntityRepository.php.twig';
}
