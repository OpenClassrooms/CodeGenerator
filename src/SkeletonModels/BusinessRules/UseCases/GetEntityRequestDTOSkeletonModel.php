<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GetEntityRequestDTOSkeletonModel extends AbstractSkeletonModel
{
    public $entityShortName;

    public $getEntityRequestClassName;

    public $getEntityRequestShortName;

    public $templatePath = 'businessRules/UseCases/GetEntityRequestDTO.php.twig';
}
