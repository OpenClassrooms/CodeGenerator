<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Generator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;

class GeneratorMock extends AbstractGenerator
{
    public FileObjectGateway $fileObjectGateway;

    public FileObject $fileObjectResponse;

    public string $generatorName;

    public bool $hasBeenGenerated = false;

    public function __construct(string $generatorName, FileObject $fileObjectResponse)
    {
        $this->fileObjectResponse = $fileObjectResponse;
        $this->generatorName = $generatorName;
        $this->hasBeenGenerated = false;
        $this->fileObjectGateway = new InMemoryFileObjectGateway();
    }

    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $this->hasBeenGenerated = true;

        $this->insertFileObject($this->fileObjectResponse);

        return $this->fileObjectResponse;
    }
}
