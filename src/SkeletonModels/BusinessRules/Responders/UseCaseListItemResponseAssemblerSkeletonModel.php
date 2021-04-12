<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseListItemResponseAssemblerSkeletonModel extends AbstractSkeletonModel
{
    public $paginatedCollectionClassName;

    public $paginatedCollectionShortName;

    public $paginatedUseCaseResponseClassName;

    public $paginatedUseCaseResponseShortName;

    public string $templatePath = 'BusinessRules/Responders/UseCaseListItemResponseAssembler.php.twig';
}
