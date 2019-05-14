<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class GetEntitiesUseCaseTestSkeletonModel extends AbstractSkeletonModel
{
    public $entitiesArgument;

    public $entitiesShortName;

    public $entityGatewayShortName;

    public $useCaseListItemResponseTestCaseClassName;

    public $entityStub1ClassName;

    public $entityStub1ShortName;

    public $entityStub2ClassName;

    public $entityStub2ShortName;

    public $getEntitiesUseCaseClassName;

    public $getEntitiesUseCaseRequestBuilderImplClassName;

    public $getEntitiesUseCaseRequestBuilderImplShortName;

    public $getEntitiesUseCaseRequestClassName;

    public $getEntitiesUseCaseRequestDTOClassName;

    public $getEntitiesUseCaseRequestDTOShortName;

    public $getEntitiesUseCaseRequestShortName;

    public $getEntitiesUseCaseShortName;

    public $inMemoryEntityGatewayClassName;

    public $inMemoryEntityGatewayShortName;

    public $templatePath = 'Tests/BusinessRules/UseCases/GetEntitiesUseCaseTest.php.twig';

    public $useCaseListItemResponseAssemblerMockClassName;

    public $useCaseListItemResponseAssemblerMockShortName;

    public $useCaseListItemResponseAssemblerShortName;

    public $useCaseListItemResponseStub1ClassName;

    public $useCaseListItemResponseStub1ShortName;

    public $useCaseListItemResponseStub2ClassName;

    public $useCaseListItemResponseStub2ShortName;

    public $useCaseListItemResponseTestCaseShortName;

    public $useCaseListItemResponsesShortName;
}
