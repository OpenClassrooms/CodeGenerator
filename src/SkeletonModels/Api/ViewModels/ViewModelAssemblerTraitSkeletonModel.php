<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class ViewModelAssemblerTraitSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'Api/ViewModels/ViewModelAssemblerTrait.php.twig';

    public $useCaseResponseArgument;

    public $useCaseResponseClassName;

    public $useCaseResponseShortName;

    public $viewModelShortName;
}
