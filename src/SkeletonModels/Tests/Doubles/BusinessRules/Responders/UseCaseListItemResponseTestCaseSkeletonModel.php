<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class UseCaseListItemResponseTestCaseSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'Tests/Doubles/BusinessRules/Responders/UseCaseListItemResponseTestCase.php.twig';

    public $useCaseListItemResponseClassName;

    public $useCaseListItemResponseMethods;

    public $useCaseListItemResponseShortName;

    public $useCaseListItemResponses;

    public $useCaseResponseShortName;

    public $useCaseResponseTestCaseShortName;
}
