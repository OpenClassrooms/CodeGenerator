<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EditEntityUseCaseRequestBuilderSkeletonModel extends AbstractSkeletonModel
{
    public $editEntityUseCaseRequestShortName;

    public $entityIdMethodName;

    public string $templatePath = 'BusinessRules/Requestors/EditEntityUseCaseRequestBuilder.php.twig';

    public $useCaseRequestClassName;

    public $useCaseRequestShortName;
}
