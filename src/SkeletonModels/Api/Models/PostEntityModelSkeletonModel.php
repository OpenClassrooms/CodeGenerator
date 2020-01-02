<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class PostEntityModelSkeletonModel extends AbstractSkeletonModel
{
    public $entityModelTraitShortName;

    public $templatePath = 'Api/Models/PostEntityModel.php.twig';
}
