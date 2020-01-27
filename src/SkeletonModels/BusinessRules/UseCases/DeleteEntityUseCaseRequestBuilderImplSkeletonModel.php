<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class DeleteEntityUseCaseRequestBuilderImplSkeletonModel extends AbstractSkeletonModel
{
    public $deleteEntityUseCaseRequestBuilderClassName;

    public $deleteEntityUseCaseRequestBuilderShortName;

    public $deleteEntityUseCaseRequestClassName;

    public $deleteEntityUseCaseRequestDTOShortName;

    public $deleteEntityUseCaseRequestShortName;

    public $entityIdArgument;

    public $templatePath = 'BusinessRules/UseCases/DeleteEntityUseCaseRequestBuilderImpl.php.twig';

    public $withEntityIdMethod;
}
