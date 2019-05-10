<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GetEntityUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public $entityNotFoundExceptionFileObjectClassName;

    public $entityNotFoundExceptionFileObjectShortName;

    public $entityShortName;

    public $entityShortNameLcFirst;

    public $entityStubClassName;

    public $entityStubShortName;

    public $getEntityUseCaseClassName;

    public $getEntityUseCaseRequestBuilderImplClassName;

    public $getEntityUseCaseRequestBuilderImplShortName;

    public $getEntityUseCaseRequestClassName;

    public $getEntityUseCaseRequestDTOClassName;

    public $getEntityUseCaseRequestDTOShortName;

    public $getEntityUseCaseRequestShortName;

    public $getEntityUseCaseShortName;

    public $inMemoryEntityGatewayClassName;

    public $inMemoryEntityGatewayShortName;

    public $templatePath = 'Tests/BusinessRules/UseCases/GetEntityUseCaseTest.php.twig';

    public $useCaseDetailResponseAssemblerMockClassName;

    public $useCaseDetailResponseAssemblerMockShortName;

    public $useCaseDetailResponseStubClassName;

    public $useCaseDetailResponseStubShortName;

    public $useCaseDetailResponseTestCaseClassName;

    public $useCaseDetailResponseTestCaseShortName;
}
