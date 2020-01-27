<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseResponseAssemblerTraitSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityMethods;

    public $entityShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Response/UseCaseResponseAssemblerTrait.php.twig';

    public $useCaseResponseClassName;

    public $useCaseResponseCommonFieldTraitShortName;

    public $useCaseResponseShortName;
}
