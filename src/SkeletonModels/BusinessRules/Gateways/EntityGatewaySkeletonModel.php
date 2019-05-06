<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class EntityGatewaySkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityNotFoundExceptionClassName;

    public $entityNotFoundExceptionShortName;

    public $entityShortName;

    public $paginatedCollectionClassName;

    public $paginatedCollectionShortName;

    public $templatePath = 'BusinessRules\Gateways\EntityGateway.php.twig';
}
