<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GenericUseCaseListItemResponseSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseResponseShortName;

    public $templatePath = 'BusinessRules/Responders/GenericUseCaseListItemResponse.php.twig';
}
