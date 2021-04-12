<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class DeleteEntityUseCaseRequestBuilderImplSkeletonModel extends AbstractSkeletonModel
{
    public string $deleteEntityUseCaseRequestBuilderClassName;

    public string $deleteEntityUseCaseRequestBuilderShortName;

    public string $deleteEntityUseCaseRequestClassName;

    public string $deleteEntityUseCaseRequestDTOShortName;

    public string $deleteEntityUseCaseRequestShortName;

    public string $entityIdArgument;

    public string $templatePath = 'BusinessRules/UseCases/DeleteEntityUseCaseRequestBuilderImpl.php.twig';

    public string $withEntityIdMethod;
}
