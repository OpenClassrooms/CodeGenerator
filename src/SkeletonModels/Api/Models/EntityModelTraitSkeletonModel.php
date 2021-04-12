<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EntityModelTraitSkeletonModel extends AbstractSkeletonModel
{
    public string $templatePath = 'Api/Models/EntityModelTrait.php.twig';
}
