<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class CreateEntityUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public string $createEntityClassName;

    public string $createEntityUseCaseRequestClassName;

    public string $createEntityUseCaseRequestShortName;

    public array $createEntityUseCaseRequestMethods;

    public string $createEntityShortName;

    public string $entityFactoryImplClassName;

    public string $entityFactoryImplShortName;

    public string $entityShortName;

    public string $entityStubClassName;

    public string $entityStubShortName;

    public string $entityUseCaseDetailResponseAssemblerMockClassName;

    public string $entityUseCaseDetailResponseAssemblerMockShortName;

    public string $entityUseCaseDetailResponseShortName;

    public string $entityUseCaseDetailResponseStubClassName;

    public string $entityUseCaseDetailResponseStubShortName;

    public string $entityUseCaseDetailResponseTestCaseClassName;

    public string $entityUseCaseDetailResponseTestCaseShortName;

    public string $inMemoryEntityGatewayClassName;

    public string $inMemoryEntityGatewayShortName;

    public string $templatePath = 'Tests/BusinessRules/UseCases/CreateEntityUseCaseTest.php.twig';

    public bool $useCarbon = false;
}
