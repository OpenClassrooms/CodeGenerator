<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\ConstObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseListItemResponseStubSkeletonModelImpl extends UseCaseListItemResponseStubSkeletonModel
{
    /**
     * @var ConstObject
     */
    public $constants;

    /**
     * @var array
     */
    public $dateTimeType;

    /**
     * @var string
     */
    public $entityStubClassName;

    /**
     * @var string
     */
    public $entityStubShortName;

    /**
     * @var string
     */
    public $hasConstructor = false;

    /**
     * @var string
     */
    public $parentClassName;

    /**
     * @var string
     */
    public $parentShortName;
}
