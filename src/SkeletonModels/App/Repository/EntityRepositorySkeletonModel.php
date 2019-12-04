<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class EntityRepositorySkeletonModel extends AbstractSkeletonModel
{
    public $entityArgument;

    public $entityClassName;

    public $entityGatewayClassName;

    public $entityGatewayShortName;

    public $entityIdArgument;

    public $entityImplClassName;

    public $entityImplShortName;

    public $entityNotFoundExceptionClassName;

    public $entityNotFoundExceptionShortName;

    public $entityShortName;

    public $templatePath = 'App/Repository/EntityRepository.php.twig';
}
