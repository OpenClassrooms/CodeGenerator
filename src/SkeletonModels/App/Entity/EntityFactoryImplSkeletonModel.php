<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EntityFactoryImplSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityFactoryClassName;

    public $entityFactoryShortName;

    public $entityImplShortName;

    public $entityShortName;

    public string $templatePath = 'App\Entity\EntityFactoryImpl.php.twig';
}
