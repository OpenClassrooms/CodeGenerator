<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EditEntityUseCaseRequestBuilderImplSkeletonModel extends AbstractSkeletonModel
{
    public $editEntityUseCaseRequestBuilderClassName;

    public $editEntityUseCaseRequestBuilderShortName;

    public $editEntityUseCaseRequestClassName;

    public $editEntityUseCaseRequestDTOShortName;

    public $editEntityUseCaseRequestShortName;

    public $entityIdArgumentName;

    public $entityIdMethodName;

    public string $templatePath = 'BusinessRules/UseCases/DTO/Request/EditEntityUseCaseRequestBuilderImpl.php.twig';
}
