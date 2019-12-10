<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntityUseCaseRequestBuilderSkeletonModel extends AbstractSkeletonModel
{
    public $entityShortName;

    public $getEntityUseCaseRequest;

    public $templatePath = 'BusinessRules/Requestors/GetEntityUseCaseRequestBuilder.php.twig';

    public $useCaseRequestClassName;
}
