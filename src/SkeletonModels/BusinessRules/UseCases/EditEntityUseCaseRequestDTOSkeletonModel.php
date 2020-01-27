<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EditEntityUseCaseRequestDTOSkeletonModel extends AbstractSkeletonModel
{
    public $editEntityUseCaseRequestClassName;

    public $editEntityUseCaseRequestShortName;

    public $entityUseCaseCommonRequestTraitShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Request/EditEntityUseCaseRequestDTO.php.twig';
}
