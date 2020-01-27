<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class DeleteEntityUseCaseRequestBuilderSkeletonModel extends AbstractSkeletonModel
{
    public $deleteEntityUseCaseRequestShortName;

    public $templatePath = 'BusinessRules/Requestors/DeleteEntityUseCaseRequestBuilder.php.twig';

    public $useCaseRequestClassName;

    public $useCaseRequestShortName;

    public $withEntityIdMethod;
}
