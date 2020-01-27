<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EntityFactorySkeletonModel extends AbstractSkeletonModel
{
    public $entityShortName;

    public $templatePath = 'BusinessRules\Entities\EntityFactory.php.twig';
}
