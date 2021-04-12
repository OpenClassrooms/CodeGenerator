<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class ViewModelDetailSkeletonModel extends AbstractSkeletonModel
{
    public string $templatePath = 'Api/ViewModels/ViewModelDetail.php.twig';

    public function getParentShortName(): string
    {
        return str_replace('Detail', '', $this->shortName);
    }
}
