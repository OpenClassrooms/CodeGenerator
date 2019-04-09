<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class GenericUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseRequestDTOClassName;

    public $genericUseCaseRequestDTOShortName;

    public $genericUseCaseRequestBuilderImplClassName;

    public $genericUseCaseRequestBuilderImplShortName;

    public $genericUseCaseClassName;

    public $genericUseCaseShortName;

    public $genericUseCaseShortNameMethod;

    public $templatePath = 'tests/BusinessRules/UseCases/GenericUseCaseTest.php.twig';
}
