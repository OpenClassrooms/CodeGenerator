<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators;

use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\UseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GenericUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GenericUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GenericUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\GenericUseCaseTestFileObjectStub1;

class UseCaseMediatorMock extends UseCaseMediatorImpl
{
    public static $alreadyExistFileObjects = [];

    public static $fileObjects = [];

    public function __construct()
    {
        self::$fileObjects = [
            new GenericUseCaseFileObjectStub1(),
            new GenericUseCaseRequestBuilderFileObjectStub1(),
            new GenericUseCaseRequestBuilderImplFileObjectStub1(),
            new GenericUseCaseRequestDTOFileObjectStub1(),
            new GenericUseCaseRequestFileObjectStub1(),
            new GenericUseCaseTestFileObjectStub1(),
        ];
    }

    public function mediate(array $args = [], array $options = []): array
    {
        return self::$fileObjects;
    }
}
