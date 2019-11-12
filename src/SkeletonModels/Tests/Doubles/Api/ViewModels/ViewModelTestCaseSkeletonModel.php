<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
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
    public $templatePath = 'Tests/Doubles/Api/ViewModels/ViewModelTestCase.php.twig';

    /**
     * @var string
     */
    public $viewModelMethod;
}
