<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelTestCase;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelTestCaseSkeletonModel extends AbstractSkeletonModel
{
    public $sourceClassName;

    public $sourceShortName;

    public $templatePath = 'tests/Doubles/Api/ViewModels/ViewModelTestCase.php.twig';
}
