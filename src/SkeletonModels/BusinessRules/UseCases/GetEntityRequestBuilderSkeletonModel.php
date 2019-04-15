<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GetEntityRequestBuilderSkeletonModel extends AbstractSkeletonModel
{
    public $entityShortName;

    public $getEntityRequest;

    public $templatePath = 'BusinessRules/UseCases/GetEntityRequestBuilder.php.twig';

    public $useCaseRequestClassName;
}
