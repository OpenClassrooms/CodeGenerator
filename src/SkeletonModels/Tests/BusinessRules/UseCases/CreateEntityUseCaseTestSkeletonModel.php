<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public $createEntityClassName;

    public $createEntityRequestBuilderImplClassName;

    public $createEntityRequestBuilderImplMethods;

    public $createEntityRequestBuilderImplShortName;

    public $createEntityRequestClassName;

    public $createEntityRequestDTOClassName;

    public $createEntityRequestDTOShortName;

    public $createEntityRequestShortName;

    public $createEntityShortName;

    public $entityDetailResponseAssemblerMockClassName;

    public $entityDetailResponseAssemblerMockShortName;

    public $entityDetailResponseShortName;

    public $entityDetailResponseStubClassName;

    public $entityDetailResponseStubShortName;

    public $entityDetailResponseTestCaseClassName;

    public $entityDetailResponseTestCaseShortName;

    public $entityFactoryImplClassName;

    public $entityFactoryImplShortName;

    public $entityShortName;

    public $entityStubClassName;

    public $entityStubShortName;

    public $inMemoryEntityGatewayClassName;

    public $inMemoryEntityGatewayShortName;

    public $templatePath = 'Tests/BusinessRules/UseCases/CreateEntityUseCaseTest.php.twig';

    public $useCarbon;
}
