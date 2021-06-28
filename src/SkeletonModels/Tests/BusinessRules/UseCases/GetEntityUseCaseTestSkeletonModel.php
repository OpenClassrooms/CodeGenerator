<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class GetEntityUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public string $entityNotFoundExceptionClassName;

    public string $entityNotFoundExceptionShortName;

    public string $entityShortName;

    public string $entityShortNameArgument;

    public string $entityStubClassName;

    public string $entityStubShortName;

    public string $getEntityUseCaseClassName;

    public string $getEntityUseCaseRequestClassName;

    public string $getEntityUseCaseRequestShortName;

    public string $getEntityUseCaseShortName;

    public string $inMemoryEntityGatewayClassName;

    public string $inMemoryEntityGatewayShortName;

    public string $templatePath = 'Tests/BusinessRules/UseCases/GetEntityUseCaseTest.php.twig';

    public string $useCaseDetailResponseAssemblerMockClassName;

    public string $useCaseDetailResponseAssemblerMockShortName;

    public string $useCaseDetailResponseStubClassName;

    public string $useCaseDetailResponseStubShortName;

    public string $useCaseDetailResponseTestCaseClassName;

    public string $useCaseDetailResponseTestCaseShortName;
}
