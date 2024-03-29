<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseListItemResponseSkeletonModel extends AbstractSkeletonModel
{
    public string $templatePath = 'BusinessRules/Responders/UseCaseListItemResponse.php.twig';

    public $useCaseResponseShortName;
}
