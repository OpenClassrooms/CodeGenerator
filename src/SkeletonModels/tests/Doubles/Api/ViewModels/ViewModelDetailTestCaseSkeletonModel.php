<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class ViewModelDetailTestCaseSkeletonModel extends AbstractSkeletonModel
{
    /**
     * @var array
     */
    public $dateTimeType;

    /**
     * @var string
     */
    public $templatePath = 'tests/Doubles/Api/ViewModels/ViewModelDetailTestCase.php.twig';

    /**
     * @var string
     */
    public $viewModelDetailClassName;

    /**
     * @var string
     */
    public $viewModelDetailShortName;

    /**
     * @var string
     */
    public $viewModelTestCaseShortName;
}
