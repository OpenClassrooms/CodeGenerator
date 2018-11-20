<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetail;

use OpenClassrooms\CodeGenerator\SkeletonModels\Api\AbstractViewModelsSkeletonModel;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class ViewModelDetailSkeletonModel extends AbstractViewModelsSkeletonModel
{
    public $templatePath = 'Api/ViewModels/ViewModelDetail.php.twig';

    public function getParentShortName(): string
    {
        return str_replace('Detail', '', $this->shortName);
    }
}
