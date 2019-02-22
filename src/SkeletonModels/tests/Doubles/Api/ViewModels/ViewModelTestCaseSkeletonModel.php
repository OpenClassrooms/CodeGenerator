<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelTestCaseSkeletonModel extends AbstractSkeletonModel
{
    /**
     * @var array
     */
    public $dateTimeType;

    /**
     * @var string
     */
    public $sourceClassName;

    /**
     * @var string
     */
    public $sourceShortName;

    /**
     * @var string
     */
    public $templatePath = 'tests/Doubles/Api/ViewModels/ViewModelTestCase.php.twig';
}
