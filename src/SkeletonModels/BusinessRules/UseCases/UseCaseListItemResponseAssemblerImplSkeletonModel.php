<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class UseCaseListItemResponseAssemblerImplSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityMethods;

    public $entityShortName;

    public $paginatedCollectionClassName;

    public $paginatedCollectionShortName;

    public $paginatedUseCaseResponseBuilderArgument;

    public $paginatedUseCaseResponseBuilderClassName;

    public $paginatedUseCaseResponseBuilderShortName;

    public $paginatedUseCaseResponseClassName;

    public $paginatedUseCaseResponseShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Response/UseCaseListItemResponseAssemblerImpl.php.twig';

    public $useCaseListItemResponseAssemblerClassName;

    public $useCaseListItemResponseAssemblerShortName;

    public $useCaseListItemResponseClassName;

    public $useCaseListItemResponseDTOShortName;

    public $useCaseListItemResponseShortName;

    public $useCaseResponseAssemblerTraitShortName;
}
