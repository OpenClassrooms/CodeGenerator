<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class ViewModelDetailAssemblerSkeletonModel extends AbstractSkeletonModel
{
    public string $templatePath = 'Api/ViewModels/ViewModelDetailAssembler.php.twig';

    public $useCaseDetailResponseArgument;

    public $useCaseDetailResponseClassName;

    public $useCaseDetailResponseShortName;

    public $viewModelDetailShortName;
}
