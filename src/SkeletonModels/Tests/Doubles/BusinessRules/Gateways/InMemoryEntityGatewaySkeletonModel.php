<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author arnaud lefevre <arnaud.lefevre@openclassrooms.com>
 */
abstract class InMemoryEntityGatewaySkeletonModel extends AbstractSkeletonModel
{
    public $entityArgument;

    public $entityClassName;

    public $entityGatewayClassName;

    public $entityGatewayShortName;

    public $entityNotFoundExceptionClassName;

    public $entityNotFoundExceptionShortName;

    public $entityShortName;

    public $entityUtilClassName;

    public $pluralEntityShortName;

    public $templatePath = 'Tests/Doubles/BusinessRules/Gateways/InMemoryEntityGateway.php.twig';
}
