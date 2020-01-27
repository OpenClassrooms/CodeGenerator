<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntityUseCaseRequestSkeletonModel extends AbstractSkeletonModel
{
    public $entityShortName;

    public $templatePath = 'BusinessRules/Requestors/GetEntityUseCaseRequest.php.twig';

    public $useCaseRequestClassName;
}
