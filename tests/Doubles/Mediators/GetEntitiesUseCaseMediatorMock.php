<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators;

use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\GetEntitiesUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseListItemResponseAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseListItemResponseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntitiesUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntityUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseListItemResponseAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseListItemResponseDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseAssemblerTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub\EntityStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub\EntityStubFileObjectStub2;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseListItemResponseStub\UseCaseListItemResponseStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseListItemResponseStub\UseCaseListItemResponseStubFileObjectStub2;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseFileObjectStub1;

class GetEntitiesUseCaseMediatorMock extends GetEntitiesUseCaseMediatorImpl
{
    public static $fileObjects = [];

    public function __construct()
    {
        self::$fileObjects = [
            new EntityStubFileObjectStub1(),
            new EntityStubFileObjectStub2(),
            new GetEntitiesUseCaseFileObjectStub1(),
            new GetEntityUseCaseRequestBuilderFileObjectStub1(),
            new GetEntityUseCaseRequestDTOFileObjectStub1(),
            new GetEntityUseCaseRequestFileObjectStub1(),
            new UseCaseResponseCommonFieldTraitFileObjectStub1(),
            new UseCaseResponseAssemblerTraitFileObjectStub1(),
            new UseCaseListItemResponseAssemblerFileObjectStub1(),
            new UseCaseListItemResponseAssemblerImplFileObjectStub1(),
            new UseCaseListItemResponseDTOFileObjectStub1(),
            new UseCaseListItemResponseFileObjectStub1(),
            new GetEntitiesUseCaseTestFileObjectStub1(),
            new UseCaseListItemResponseAssemblerMockFileObjectStub1(),
            new UseCaseListItemResponseStubFileObjectStub1(),
            new UseCaseListItemResponseStubFileObjectStub2(),
            new UseCaseListItemResponseTestCaseFileObjectStub1(),
            new UseCaseResponseTestCaseFileObjectStub1(),
        ];
    }

    public function mediate(array $args = [], array $options = []): array
    {
        return self::$fileObjects;
    }
}
