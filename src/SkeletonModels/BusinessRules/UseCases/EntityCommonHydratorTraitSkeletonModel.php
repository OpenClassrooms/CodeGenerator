<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EntityCommonHydratorTraitSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $useCaseRequestClassName;

    public $entityShortName;

    public $entityArgument;

    public $useCaseRequestShortName;

    public $editEntityUseCaseRequestMethods;

    public $templatePath = 'BusinessRules/UseCases/EntityCommonHydratorTrait.php.twig';
}
