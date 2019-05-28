<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class EntityNotFoundExceptionSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'BusinessRules\Gateways\EntityNotFoundException.php.twig';
}
