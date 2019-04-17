<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GenericUseCaseResponseSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseResponseMethods;

    public $templatePath = 'BusinessRules/Responders/GenericUseCaseResponse.php.twig';

    public $useCaseResponseClassName;

    public $useCaseResponseShortName;
}
