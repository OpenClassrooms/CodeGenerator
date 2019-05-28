<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GetEntityUseCaseRequestBuilderSkeletonModel extends AbstractSkeletonModel
{
    public $entityShortName;

    public $getEntityUseCaseRequest;

    public $templatePath = 'BusinessRules/Requestors/GetEntityUseCaseRequestBuilder.php.twig';

    public $useCaseRequestClassName;
}
