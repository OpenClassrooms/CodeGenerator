<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators;

use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\GetEntityUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseDetailResponseAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseDetailResponseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntityUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntityUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseDetailResponseAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseDetailResponseDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseDetailResponseStub\UseCaseDetailResponseStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\GetEntityUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseAssemblerMockFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseFileObjectStub1;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseMediatorMock extends GetEntityUseCaseMediatorImpl
{
    public static $alreadyExistFileObjects = [];

    public static $fileObjects = [];

    public function __construct()
    {
        self::$fileObjects = [
            new GetEntityUseCaseFileObjectStub1(),
            new GetEntityUseCaseRequestBuilderFileObjectStub1(),
            new GetEntityUseCaseRequestBuilderImplFileObjectStub1(),
            new GetEntityUseCaseRequestDTOFileObjectStub1(),
            new GetEntityUseCaseRequestFileObjectStub1(),
            new UseCaseResponseDTOFileObjectStub1(),
            new UseCaseResponseTraitFileObjectStub1(),
            new UseCaseDetailResponseAssemblerFileObjectStub1(),
            new UseCaseDetailResponseAssemblerImplFileObjectStub1(),
            new UseCaseDetailResponseDTOFileObjectStub1(),
            new UseCaseDetailResponseFileObjectStub1(),
            new GetEntityUseCaseTestFileObjectStub1(),
            new UseCaseDetailResponseAssemblerMockFileObjectStub1(),
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