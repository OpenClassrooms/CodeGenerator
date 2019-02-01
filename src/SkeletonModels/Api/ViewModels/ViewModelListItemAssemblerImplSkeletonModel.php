<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class ViewModelListItemAssemblerImplSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'Api/ViewModels/ViewModelListItemAssemblerImpl.php.twig';

    public $useCaseListItemResponseArgument;

    public $useCaseResponseClassName;

    public $useCaseListItemResponseShortName;

    public $useCaseResponseArgument;

    public $useCaseResponseShortName;

    public $viewModelAssemblerTrait;

    public $viewModelAssemblerTraitClassName;

    public $viewModelAssemblerTraitShortName;

    public $viewModelListItemAssemblerClassName;

    public $viewModelListItemAssemblerShortName;

    public $viewModelListItemClassName;

    public $viewModelListItemImplShortName;

    public $viewModelListItemShortName;
}
