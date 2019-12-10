<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class DeleteEntityUseCaseRequestDTOSkeletonModel extends AbstractSkeletonModel
{
    public $deletelEntityUseCaseRequestClassName;

    public $deletelEntityUseCaseRequestShortName;

    public $entityIdArgument;

    public $getEntityIdMethod;

    public $templatePath = 'BusinessRules/UseCases/DeleteEntityUseCaseRequestDTO.php.twig';
}
