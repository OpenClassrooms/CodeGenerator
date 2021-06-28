<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EntityUseCaseCommonRequestTraitSkeletonModel extends AbstractSkeletonModel
{
    public string $templatePath = 'BusinessRules/UseCases/DTO/Request/EntityUseCaseCommonRequestTrait.php.twig';
}
