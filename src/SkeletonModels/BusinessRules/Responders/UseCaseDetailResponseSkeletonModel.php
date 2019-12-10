<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseDetailResponseSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseDetailMethods;

    public $templatePath = 'BusinessRules/Responders/UseCaseDetailResponse.php.twig';

    public $useCaseResponseShortName;
}
