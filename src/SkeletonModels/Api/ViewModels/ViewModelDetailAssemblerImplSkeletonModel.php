<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class ViewModelDetailAssemblerImplSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'Api/ViewModels/ViewModelDetailAssemblerImpl.php.twig';

    public $useCaseDetailResponseArgument;

    public $useCaseDetailResponseClassName;

    public $useCaseDetailResponseShortName;

    public $viewModelAssemblerTrait;

    public $viewModelAssemblerTraitClassName;

    public $viewModelAssemblerTraitShortName;

    public $viewModelDetailAssemblerClassName;

    public $viewModelDetailAssemblerShortName;

    public $viewModelDetailClassName;

    public $viewModelDetailImplShortName;

    public $viewModelDetailShortName;
}
