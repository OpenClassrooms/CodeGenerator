<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class ViewModelListItemAssemblerSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'Api/ViewModels/ViewModelListItemAssembler.php.twig';

    public $useCaseResponseClassName;

    public $useCaseResponseShortName;

    public $useCaseResponseArgument;

    public $useCaseListItemResponseArgument;

    public $useCaseListItemResponseClassName;

    public $useCaseListItemResponseShortName;

    public $viewModelListItemShortName;
}
