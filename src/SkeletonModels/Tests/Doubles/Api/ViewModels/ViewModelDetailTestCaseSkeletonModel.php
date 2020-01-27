<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class ViewModelDetailTestCaseSkeletonModel extends AbstractSkeletonModel
{
    /**
     * @var array
     */
    public $dateTimeType;

    /**
     * @var string
     */
    public $templatePath = 'Tests/Doubles/Api/ViewModels/ViewModelDetailTestCase.php.twig';

    /**
     * @var string
     */
    public $viewModelDetailClassName;

    /**
     * @var string
     */
    public $viewModelDetailMethod;

    /**
     * @var string
     */
    public $viewModelDetailShortName;

    /**
     * @var string
     */
    public $viewModelTestCaseMethod;

    /**
     * @var string
     */
    public $viewModelTestCaseShortName;
}
