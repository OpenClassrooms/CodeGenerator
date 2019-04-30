<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GenericUseCaseListItemResponseAssemblerImplSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityMethods;

    public $entityShortName;

    public $genericUseCaseListItemResponseAssemblerClassName;

    public $genericUseCaseListItemResponseAssemblerShortName;

    public $genericUseCaseListItemResponseClassName;

    public $genericUseCaseListItemResponseDTOShortName;

    public $genericUseCaseListItemResponseShortName;

    public $genericUseCaseResponseTraitShortName;

    public $paginatedCollectionClassName;

    public $paginatedCollectionShortName;

    public $paginatedUseCaseResponseBuilderArgument;

    public $paginatedUseCaseResponseBuilderClassName;

    public $paginatedUseCaseResponseBuilderShortName;

    public $paginatedUseCaseResponseClassName;

    public $paginatedUseCaseResponseShortName;

    public $templatePath = 'BusinessRules/UseCases/GenericUseCaseListItemResponseAssemblerImpl.php.twig';
}
