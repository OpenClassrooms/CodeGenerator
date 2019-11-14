<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityUseCaseRequestDTOSkeletonModel extends AbstractSkeletonModel
{
    public $createEntityRequestClassName;

    public $createEntityRequestShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Request/CreateEntityUseCaseRequestDTO.php.twig';
}
