<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\Api\AbstractViewModelsSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class ViewModelListItemStubSkeletonModel extends AbstractViewModelsSkeletonModel
{
    /**
     * @var string
     */
    public $parentClassName;

    /**
     * @var string
     */
    public $parentShortName;

    public $templatePath = 'tests/Doubles/ViewModelListItemStub.php.twig';
}
