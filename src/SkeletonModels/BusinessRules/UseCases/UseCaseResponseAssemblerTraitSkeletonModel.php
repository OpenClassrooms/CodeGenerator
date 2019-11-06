<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class UseCaseResponseAssemblerTraitSkeletonModel extends AbstractSkeletonModel
{
    public $entityClassName;

    public $entityMethods;

    public $entityShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Response/UseCaseResponseAssemblerTrait.php.twig';

    public $useCaseResponseClassName;

    public $useCaseResponseDTOShortName;

    public $useCaseResponseShortName;
}
