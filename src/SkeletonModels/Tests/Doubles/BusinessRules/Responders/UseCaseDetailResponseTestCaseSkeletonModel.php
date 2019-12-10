<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseDetailResponseTestCaseSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'Tests/Doubles/BusinessRules/Responders/UseCaseDetailResponseTestCase.php.twig';

    public $useCaseDetailResponseClassName;

    public $useCaseDetailResponseMethods;

    public $useCaseDetailResponseShortName;

    public $useCaseResponseShortName;

    public $useCaseResponseTestCaseShortName;
}
