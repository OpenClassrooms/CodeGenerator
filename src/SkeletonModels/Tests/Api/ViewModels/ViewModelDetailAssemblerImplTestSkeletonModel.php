<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class ViewModelDetailAssemblerImplTestSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'Tests/Api/ViewModels/Impl/ViewModelDetailAssemblerImplTest.php.twig';

    /**
     * @var string
     */
    public $useCaseDetailResponseStubClassName;

    /**
     * @var string
     */
    public $useCaseDetailResponseStubShortName;

    /**
     * @var string
     */
    public $viewModelDetailAssemblerClassName;

    /**
     * @var string
     */
    public $viewModelDetailAssemblerImplClassName;

    /**
     * @var string
     */
    public $viewModelDetailAssemblerImplShortName;

    /**
     * @var string
     */
    public $viewModelDetailAssemblerImplTestNamespace;

    /**
     * @var string
     */
    public $viewModelDetailAssemblerShortName;

    /**
     * @var FieldObject[]
     */
    public $viewModelDetailFields;

    /**
     * @var string
     */
    public $viewModelDetailStubClassName;

    /**
     * @var string
     */
    public $viewModelDetailStubShortName;

    /**
     * @var string
     */
    public $viewModelDetailTestCaseClassName;

    /**
     * @var string
     */
    public $viewModelDetailTestCaseMethod;

    /**
     * @var string
     */
    public $viewModelDetailTestCaseShortName;
}
