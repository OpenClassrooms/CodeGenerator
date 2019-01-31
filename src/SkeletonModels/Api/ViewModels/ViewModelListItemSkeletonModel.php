<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class ViewModelListItemSkeletonModel extends AbstractSkeletonModel
{
    public $parentShortName;

    public $templatePath = 'Api/ViewModels/ViewModelListItem.php.twig';
}
