<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseResponseCommonFieldTraitSkeletonModel extends AbstractSkeletonModel
{
    public string $templatePath = 'BusinessRules/UseCases/DTO/Response/UseCaseResponseCommonFieldTrait.php.twig';
}
