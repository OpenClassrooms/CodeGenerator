<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GenericUseCaseListItemResponseAssemblerSkeletonModel extends AbstractSkeletonModel
{
    public $paginatedCollectionClassName;

    public $paginatedCollectionShortName;

    public $paginatedUseCaseResponseClassName;

    public $paginatedUseCaseResponseShortName;

    public $templatePath = 'BusinessRules/Responders/GenericUseCaseListItemResponseAssembler.php.twig';
}
