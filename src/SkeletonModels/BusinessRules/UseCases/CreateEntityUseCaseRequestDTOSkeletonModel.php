<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityUseCaseRequestDTOSkeletonModel extends AbstractSkeletonModel
{
    public $createEntityUseCaseRequestClassName;

    public $createEntityUseCaseRequestShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Request/CreateEntityUseCaseRequestDTO.php.twig';
}
