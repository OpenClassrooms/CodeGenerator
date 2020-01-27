<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityUseCaseRequestSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'BusinessRules/Requestors/CreateEntityUseCaseRequest.php.twig';

    public $useCaseRequestClassName;

    public $useCaseRequestShortName;
}
