<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public $createEntityClassName;

    public $createEntityUseCaseRequestBuilderImplClassName;

    public $createEntityUseCaseRequestBuilderImplMethods;

    public $createEntityUseCaseRequestBuilderImplShortName;

    public $createEntityUseCaseRequestClassName;

    public $createEntityUseCaseRequestDTOClassName;

    public $createEntityUseCaseRequestDTOShortName;

    public $createEntityUseCaseRequestShortName;

    public $createEntityShortName;

    public $entityFactoryImplClassName;

    public $entityFactoryImplShortName;

    public $entityShortName;

    public $entityStubClassName;

    public $entityStubShortName;

    public $entityUseCaseDetailResponseAssemblerMockClassName;

    public $entityUseCaseDetailResponseAssemblerMockShortName;

    public $entityUseCaseDetailResponseShortName;

    public $entityUseCaseDetailResponseStubClassName;

    public $entityUseCaseDetailResponseStubShortName;

    public $entityUseCaseDetailResponseTestCaseClassName;

    public $entityUseCaseDetailResponseTestCaseShortName;

    public $inMemoryEntityGatewayClassName;

    public $inMemoryEntityGatewayShortName;

    public $templatePath = 'Tests/BusinessRules/UseCases/CreateEntityUseCaseTest.php.twig';

    public $useCarbon;
}
