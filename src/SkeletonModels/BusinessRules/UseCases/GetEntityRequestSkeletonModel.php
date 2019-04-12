<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GetEntityRequestSkeletonModel extends AbstractSkeletonModel
{
    public $entityShortName;

    public $templatePath = 'BusinessRules/UseCases/GetEntityRequest.php.twig';

    public $useCaseRequestClassName;
}
