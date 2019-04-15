<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GetEntityRequestBuilderImplSkeletonModel extends AbstractSkeletonModel
{
    public $entityShortName;

    public $getEntityRequestBuilderClassName;

    public $getEntityRequestBuilderShortName;

    public $getEntityRequestClassName;

    public $getEntityRequestDTOShortName;

    public $getEntityRequestShortName;

    public $templatePath = 'BusinessRules/UseCases/GetEntityRequestBuilderImpl.php.twig';
}
