<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class ViewModelDetailAssemblerSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'Api/ViewModels/ViewModelDetailAssembler.php.twig';

    public $useCaseDetailResponseArgument;

    public $useCaseDetailResponseClassName;

    public $useCaseDetailResponseShortName;

    public $viewModelDetailShortName;
}
