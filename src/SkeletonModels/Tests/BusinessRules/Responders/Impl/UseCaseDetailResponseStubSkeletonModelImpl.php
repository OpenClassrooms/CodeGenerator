<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModel;

class UseCaseDetailResponseStubSkeletonModelImpl extends UseCaseDetailResponseStubSkeletonModel
{
    /**
     * @var ConstObject[]
     */
    public array $constants;

    public array $dateTimeType;

    public string $entityStubClassName;

    public string $entityStubShortName;

    public bool $hasConstructor = false;

    public string $parentClassName;

    public string $parentShortName;
}
