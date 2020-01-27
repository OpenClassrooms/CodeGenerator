<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class PatchEntityModelSkeletonModel extends AbstractSkeletonModel
{
    public $constants;

    public $entityModelTraitShortName;

    public $templatePath = 'Api/Models/PatchEntityModel.php.twig';
}
