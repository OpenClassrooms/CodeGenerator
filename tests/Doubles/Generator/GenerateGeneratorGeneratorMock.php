<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Generator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\GenerateGeneratorGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;

class GenerateGeneratorGeneratorMock extends GenerateGeneratorGenerator
{
    public FileObjectGateway $fileObjectGateway;

    /**
     * @var FileObject[]
     */
    public array $fileObjectResponses;

    public bool $hasBeenGenerated = false;

    /**
     * @param FileObject[]
     */
    public function __construct(array $fileObjectResponses)
    {
        $this->fileObjectResponses = $fileObjectResponses;
        $this->hasBeenGenerated = false;
        $this->fileObjectGateway = new InMemoryFileObjectGateway();
    }

    public function generate(GeneratorRequest $generatorRequest): array
    {
        $this->hasBeenGenerated = true;

        foreach ($this->fileObjectResponses as $fileObjectResponse) {
            $this->fileObjectGateway->insert($fileObjectResponse);
        }

        return $this->fileObjectResponses;
    }
}
