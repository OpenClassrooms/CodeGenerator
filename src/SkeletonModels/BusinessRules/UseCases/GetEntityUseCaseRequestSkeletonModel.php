<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GetEntityUseCaseRequestSkeletonModel extends AbstractSkeletonModel
{
    public $entityShortName;

    public $templatePath = 'BusinessRules/UseCases/GetEntityUseCaseRequest.php.twig';

    public $useCaseRequestClassName;
}
