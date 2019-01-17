<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class ViewModelListItemTestCaseSkeletonModel extends AbstractSkeletonModel
{
    public $viewModelListItemClassName;

    public $viewModelListItemShortName;

    public $templatePath = 'tests/Doubles/Api/ViewModels/ViewModelListItemTestCase.php.twig';

    public $viewModelTestCaseShortName;
}
