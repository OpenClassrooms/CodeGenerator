<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GetEntitiesUseCaseRequestDTOSkeletonModel extends AbstractSkeletonModel
{
    public $getEntitiesUseCaseRequestClassName;

    public $getEntitiesUseCaseRequestShortName;

    public $paginationClassName;

    public $paginationShortName;

    public $templatePath = 'BusinessRules/UseCases/GetEntitiesUseCaseRequestDTO.php.twig';
}
