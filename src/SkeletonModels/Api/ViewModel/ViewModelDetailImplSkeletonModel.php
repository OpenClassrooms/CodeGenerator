<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class ViewModelDetailImplSkeletonModel extends AbstractSkeletonModel
{
    public $parentClassName;

    public $parentShortName;

    public $templatePath = 'Api/ViewModels/ViewModelDetailImpl.php.twig';
}
