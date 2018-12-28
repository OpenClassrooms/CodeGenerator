<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Generator;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GeneratorMock implements Generator
{
    /**
     * @var FileObject
     */
    public $fileObjectResponse;

    /**
     * @var string
     */
    public $generatorName;

    /**
     * @var FileObjectGateway
     */
    public $fileObjectGateway;

    /**
     * @var bool
     */
    public $hasBeenGenerated = false;

    public function __construct(string $generatorName, FileObject $fileObjectResponse = null)
    {
        $this->fileObjectResponse = $fileObjectResponse;
        $this->generatorName = $generatorName;
        $this->hasBeenGenerated = false;
        $this->fileObjectGateway = new InMemoryFileObjectGateway();
    }

    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $this->hasBeenGenerated = true;

        $this->fileObjectGateway->insert($this->fileObjectResponse);

        return $this->fileObjectResponse;
    }
}
