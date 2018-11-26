<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class ViewModelListItemStubSkeletonModel extends AbstractSkeletonModel
{
    /**
     * @var string
     */
    public $parentClassName;

    /**
     * @var string
     */
    public $parentShortName;

    /**
     * @var string
     */
    public $useCaseDetailResponseStubClassName;

    /**
     * @var string
     */
    public $constructorNeeded = false;

    public $templatePath = 'tests/Doubles/ViewModelListItemStub.php.twig';
}
