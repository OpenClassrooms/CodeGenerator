<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseResponseSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'BusinessRules/Responders/UseCaseResponse.php.twig';

    public $useCaseResponseClassName;

    public $useCaseResponseMethods;

    public $useCaseResponseShortName;
}
