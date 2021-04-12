<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EntityStubSkeletonModel extends AbstractSkeletonModel
{
    /**
     * @var ConstObject[]
     */
    public array $constants;

    public array $dateTimeType;

    public bool $hasConstructor;

    public string $parentClassName;

    public string $parentShortName;

    public string $templatePath = 'Tests/Doubles/BusinessRules/Entities/EntityStub.php.twig';
}
