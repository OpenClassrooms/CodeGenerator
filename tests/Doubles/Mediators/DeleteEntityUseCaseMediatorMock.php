<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators;

use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\DeleteEntityUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\DeleteEntityUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\DeleteEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\DeleteEntityUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\DeleteEntityUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\DeleteEntityUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\DeleteEntityUseCaseTestFileObjectStub1;

class DeleteEntityUseCaseMediatorMock extends DeleteEntityUseCaseMediatorImpl
{
    public static $fileObjects = [];

    public function __construct()
    {
        self::$fileObjects = [
            new DeleteEntityUseCaseFileObjectStub1(),
            new DeleteEntityUseCaseRequestBuilderFileObjectStub1(),
            new DeleteEntityUseCaseRequestBuilderImplFileObjectStub1(),
            new DeleteEntityUseCaseRequestDTOFileObjectStub1(),
            new DeleteEntityUseCaseRequestFileObjectStub1(),
            new DeleteEntityUseCaseTestFileObjectStub1(),
        ];
    }

    public function mediate(array $args = [], array $options = []): array
    {
        return self::$fileObjects;
    }
}
