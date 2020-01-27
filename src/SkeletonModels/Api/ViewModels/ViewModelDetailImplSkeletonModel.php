<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class ViewModelDetailImplSkeletonModel extends AbstractSkeletonModel
{
    public $parentClassName;

    public $parentShortName;

    public $templatePath = 'Api/ViewModels/ViewModelDetailImpl.php.twig';
}
