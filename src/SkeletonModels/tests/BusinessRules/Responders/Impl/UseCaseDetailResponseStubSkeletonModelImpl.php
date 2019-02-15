<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\ConstObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseDetailResponseStubSkeletonModelImpl extends UseCaseDetailResponseStubSkeletonModel
{
    /**
     * @var ConstObject[]
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
