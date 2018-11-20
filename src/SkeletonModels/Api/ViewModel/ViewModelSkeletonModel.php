<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel;

use OpenClassrooms\CodeGenerator\SkeletonModels\Api\AbstractViewModelsSkeletonModel;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class ViewModelSkeletonModel extends AbstractViewModelsSkeletonModel
{
    public $templatePath = 'Api/ViewModels/ViewModel.php.twig';
}
