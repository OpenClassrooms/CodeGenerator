<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EntityNotFoundExceptionSkeletonModel extends AbstractSkeletonModel
{
    public string $templatePath = 'BusinessRules\Gateways\EntityNotFoundException.php.twig';
}
