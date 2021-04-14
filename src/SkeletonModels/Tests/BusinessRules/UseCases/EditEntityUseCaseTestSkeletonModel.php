<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EditEntityUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public string $editEntityUseCaseClassName;

    public string $editEntityUseCaseRequestBuilderImplClassName;

    public array $editEntityUseCaseRequestBuilderImplMethods;

    public string $editEntityUseCaseRequestBuilderImplShortName;

    public string $editEntityUseCaseRequestClassName;

    public string $editEntityUseCaseRequestDTOClassName;

    public string $editEntityUseCaseRequestDTOShortName;

    public string $editEntityUseCaseRequestShortName;

    public string $editEntityUseCaseShortName;

    public string $entityArgument;

    public string $entityIdArgument;

    public string $entityNotFoundExceptionClassName;

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

    public string $entityUtilClassName;

    public string $inMemoryEntityUseCaseGatewayClassName;

    public string $inMemoryEntityUseCaseGatewayShortName;

    public string $templatePath = 'Tests/BusinessRules/UseCases/EditEntityUseCaseTest.php.twig';

    public bool $useCarbon;
}
