<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EntityRepositorySkeletonModel extends AbstractSkeletonModel
{
    public string $entityArgument;

    public string $entityClassName;

    public string $entityFirstLetter;

    public string $entityGatewayClassName;

    public string $entityGatewayShortName;

    public string $entityIdArgument;

    public string $entityImplClassName;

    public string $entityImplShortName;

    public string $entityNotFoundExceptionClassName;

    public string $entityNotFoundExceptionShortName;

    public string $entityShortName;

    public string $paginatedCollectionFactoryArgument;

    public string $paginatedCollectionFactoryClassName;

    public string $paginatedCollectionFactoryShortName;

    public string $templatePath = 'App/Repository/EntityRepository.php.twig';
}
