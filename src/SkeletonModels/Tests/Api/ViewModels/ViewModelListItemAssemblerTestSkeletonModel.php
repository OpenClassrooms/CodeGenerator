<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class ViewModelListItemAssemblerTestSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'Tests/Api/ViewModels/ViewModelListItemAssemblerTest.php.twig';

    /**
     * @var string
     */
    public $useCaseListItemResponseStubClassName;

    /**
     * @var string
     */
    public $useCaseListItemResponseStubShortName;

    /**
     * @var string
     */
    public $viewModelListItemAssemblerClassName;

    /**
     * @var string
     */
    public $viewModelListItemAssemblerImplTestNamespace;

    /**
     * @var string
     */
    public $viewModelListItemAssemblerShortName;

    /**
     * @var FieldObject[]
     */
    public $viewModelListItemFields;

    /**
     * @var string
     */
    public $viewModelListItemStubClassName;

    /**
     * @var string
     */
    public $viewModelListItemStubShortName;
}
