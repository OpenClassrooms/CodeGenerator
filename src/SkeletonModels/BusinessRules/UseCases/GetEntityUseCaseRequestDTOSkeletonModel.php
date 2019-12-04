<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntityUseCaseRequestDTOSkeletonModel extends AbstractSkeletonModel
{
    public $entityShortName;

    public $getEntityUseCaseRequestClassName;

    public $getEntityUseCaseRequestShortName;

    public $templatePath = 'BusinessRules/UseCases/DTO/Request/GetEntityUseCaseRequestDTO.php.twig';
}
