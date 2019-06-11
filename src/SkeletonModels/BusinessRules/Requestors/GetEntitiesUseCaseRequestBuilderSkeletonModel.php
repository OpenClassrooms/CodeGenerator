<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GetEntitiesUseCaseRequestBuilderSkeletonModel extends AbstractSkeletonModel
{
    public $getEntityUseCaseRequestShortName;

    public $templatePath = 'BusinessRules/Requestors/GetEntitiesUseCaseRequestBuilder.php.twig';

    public $useCaseRequestClassName;

    public $useCaseRequestShortName;
}
