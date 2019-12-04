<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators;

use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\EditEntityUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\EditEntityUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\EditEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseDetailResponseAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseDetailResponseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EditEntityUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EditEntityUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EditEntityUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseDetailResponseAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseDetailResponseDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseAssemblerTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseDetailResponseStub\UseCaseDetailResponseStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\EditEntityUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewayFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseAssemblerMockFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseFileObjectStub1;

class EditEntityUseCaseMediatorMock extends EditEntityUseCaseMediatorImpl
{
    public static $alreadyExistFileObjects = [];

    public static $fileObjects = [];

    public function __construct()
    {
        self::$fileObjects = [
            new EditEntityUseCaseFileObjectStub1(),
            new EditEntityUseCaseRequestBuilderFileObjectStub1(),
            new EditEntityUseCaseRequestBuilderImplFileObjectStub1(),
            new EditEntityUseCaseRequestDTOFileObjectStub1(),
            new EditEntityUseCaseRequestFileObjectStub1(),
            new EditEntityUseCaseTestFileObjectStub1(),
            new InMemoryEntityGatewayFileObjectStub1(),
            new UseCaseResponseCommonFieldTraitFileObjectStub1(),
            new UseCaseResponseAssemblerTraitFileObjectStub1(),
            new UseCaseDetailResponseAssemblerFileObjectStub1(),
            new UseCaseDetailResponseAssemblerImplFileObjectStub1(),
            new UseCaseDetailResponseAssemblerMockFileObjectStub1(),
            new UseCaseDetailResponseDTOFileObjectStub1(),
            new UseCaseDetailResponseFileObjectStub1(),
            new UseCaseDetailResponseStubFileObjectStub1(),
            new UseCaseDetailResponseTestCaseFileObjectStub1(),
            new UseCaseResponseTestCaseFileObjectStub1(),
        ];
    }

    public function mediate(array $args = [], array $options = []): array
    {
        return self::$fileObjects;
    }
}
