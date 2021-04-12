<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModel;

class UseCaseListItemResponseStubSkeletonModelImpl extends UseCaseListItemResponseStubSkeletonModel
{
    /**
     * @var ConstObject[]
     */
    public array $constants;

    public array $dateTimeType;

    public string $entityStubClassName;

    public string $entityStubShortName;

    public bool $hasConstructor = false;

    public string $useCaseListItemResponseDTOClassName;

    public string $useCaseListItemResponseDTOShortName;
}
