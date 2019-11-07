<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityRequestDTOSkeletonModel extends AbstractSkeletonModel
{
    public $createEntityRequestClassName;

    public $createEntityRequestShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Request/CreateEntityRequestDTO.php.twig';
}
