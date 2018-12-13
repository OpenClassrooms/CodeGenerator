<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class ViewModelDetailTestCaseSkeletonModel extends AbstractSkeletonModel
{
    public $viewModelDetailClassName;

    public $viewModelDetailShortName;

    public $templatePath = 'tests/Doubles/Api/ViewModels/ViewModelDetailTestCase.php.twig';

    public $viewModelTestCaseShortName;
}
