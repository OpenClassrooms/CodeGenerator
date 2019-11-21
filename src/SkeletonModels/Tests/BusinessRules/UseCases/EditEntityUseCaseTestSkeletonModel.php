<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class EditEntityUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public $editEntityUseCaseRequestBuilderImplMethods;

    public $editEntityUseCaseClassName;

    public $editEntityUseCaseRequestBuilderImplClassName;

    public $editEntityUseCaseRequestBuilderImplShortName;

    public $editEntityUseCaseRequestClassName;

    public $editEntityUseCaseRequestDTOClassName;

    public $editEntityUseCaseRequestDTOShortName;

    public $editEntityUseCaseRequestShortName;

    public $editEntityUseCaseShortName;

    public $entityArgument;

    public $entityIdArgument;

    public $entityNotFoundExceptionClassName;

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

    public $entityUtilClassName;

    public $inMemoryEntityUseCaseGatewayClassName;

    public $inMemoryEntityUseCaseGatewayShortName;

    public $templatePath = 'Tests/BusinessRules/UseCases/EditEntityUseCaseTest.php.twig';

    public $useCarbon;
}
