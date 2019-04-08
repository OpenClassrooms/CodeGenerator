<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\ConstObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class ViewModelDetailStubSkeletonModel extends AbstractSkeletonModel
{
    /**
     * @var ConstObject[]
     */
    public $constants;

    /**
     * @var array
     */
    public $dateTimeType;

    /**
     * @var string
     */
    public $hasConstructor = false;

    /**
     * @var string
     */
    public $parentClassName;

    /**
     * @var string
     */
    public $parentShortName;

    public $templatePath = 'tests/Doubles/Api/ViewModels/ViewModelDetailStub.php.twig';

    /**
     * @var string
     */
    public $useCaseDetailResponseStubClassName;
}
