<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EntityImplSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityShortName;

    public $templatePath = 'App/Entity/EntityImpl.php.twig';
}
