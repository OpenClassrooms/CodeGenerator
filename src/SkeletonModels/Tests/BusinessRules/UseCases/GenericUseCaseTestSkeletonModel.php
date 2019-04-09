<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GenericUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public $genericUseCaseRequestClassName;

    public $genericUseCaseRequestShortName;

    public $genericUseCaseRequestDTOClassName;

    public $genericUseCaseRequestDTOShortName;

    public $genericUseCaseRequestBuilderImplClassName;

    public $genericUseCaseRequestBuilderImplShortName;

    public $genericUseCaseClassName;

    public $genericUseCaseShortName;

    public $genericUseCaseTestMethod;

    public $templatePath = 'tests/BusinessRules/UseCases/GenericUseCaseTest.php.twig';
}
