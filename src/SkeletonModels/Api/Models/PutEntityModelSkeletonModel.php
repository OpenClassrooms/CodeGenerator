<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class PutEntityModelSkeletonModel extends AbstractSkeletonModel
{
    public $constants;

    public $entityModelTraitShortName;

    public string $templatePath = 'Api/Models/PutEntityModel.php.twig';
}
