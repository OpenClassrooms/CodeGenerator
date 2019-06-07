<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GetEntitiesUseCaseRequestBuilderImplSkeletonModel extends AbstractSkeletonModel
{
    public $getEntitiesUseCaseRequestBuilderClassName;

    public $getEntitiesUseCaseRequestBuilderShortName;

    public $getEntitiesUseCaseRequestClassName;

    public $getEntitiesUseCaseRequestDTOShortName;

    public $getEntitiesUseCaseRequestShortName;

    public $templatePath = 'BusinessRules/UseCases/GetEntitiesUseCaseRequestBuilderImpl.php.twig';
}
