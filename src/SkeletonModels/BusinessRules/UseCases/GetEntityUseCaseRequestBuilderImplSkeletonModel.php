<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GetEntityUseCaseRequestBuilderImplSkeletonModel extends AbstractSkeletonModel
{
    public $entityShortName;

    public $getEntityUseCaseRequestBuilderClassName;

    public $getEntityUseCaseRequestBuilderShortName;

    public $getEntityUseCaseRequestClassName;

    public $getEntityUseCaseRequestDTOShortName;

    public $getEntityUseCaseRequestShortName;

    public $templatePath = 'BusinessRules/UseCases/GetEntityUseCaseRequestBuilderImpl.php.twig';
}
