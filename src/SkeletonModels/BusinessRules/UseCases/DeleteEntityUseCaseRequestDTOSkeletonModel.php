<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class DeleteEntityUseCaseRequestDTOSkeletonModel extends AbstractSkeletonModel
{
    public string $deleteEntityUseCaseRequestClassName;

    public string $deleteEntityUseCaseRequestShortName;

    public string $entityIdArgument;

    public string $getEntityIdMethod;

    public string $templatePath = 'BusinessRules/UseCases/DeleteEntityUseCaseRequestDTO.php.twig';
}
