<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class DeleteEntityUseCaseRequestSkeletonModel extends AbstractSkeletonModel
{
    public $entityIdMethodName;

    public string $templatePath = 'BusinessRules/Requestors/DeleteEntityUseCaseRequest.php.twig';

    public $useCaseRequestClassName;

    public $useCaseRequestShortName;
}
