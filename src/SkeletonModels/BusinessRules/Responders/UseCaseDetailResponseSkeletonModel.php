<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class UseCaseDetailResponseSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseDetailMethods;

    public $useCaseResponseShortName;

    public $templatePath = 'BusinessRules/Responders/UseCaseDetailResponse.php.twig';
}
