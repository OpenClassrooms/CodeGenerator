<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseListItemResponseStubSkeletonModelImpl extends UseCaseListItemResponseStubSkeletonModel
{
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
    public $parentClassName;

    /**
     * @var string
     */
    public $parentShortName;

    /**
     * @var string
     */
    public $viewModelListItemStubClassName;

    /**
     * @var string
     */
    public $viewModelListItemStubShortName;
}
