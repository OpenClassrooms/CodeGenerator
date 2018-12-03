<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class UseCaseDetailResponseStubSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'tests/Doubles/BusinessRules/Responders/UseCaseDetailResponseStub.php.twig';
}
