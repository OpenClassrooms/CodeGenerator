<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class ViewModelSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'Api/ViewModels/ViewModel.php.twig';
}
