<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;

trait CommonEntityUseCaseMediatorTestTrait
{
    /**
     * @test
     */
    public function callMediateWithDumpOptions(): void
    {
        $this->options[Options::DUMP] = null;
        $fileObjects = $this->mediator->mediate(
            [
                Args::CLASS_NAME => FunctionalEntity::class,
            ],
            $this->options
        );

        $this->assertEmpty(InMemoryFileObjectGateway::$flushedFileObjects);
        $this->assertNotEmpty(InMemoryFileObjectGateway::$fileObjects);
        foreach ($fileObjects as $fileObject) {
            /** @var FileObject $fileObject */
            $this->assertArrayHasKey($fileObject->getClassName(), InMemoryFileObjectGateway::$fileObjects);
        }
    }

    /**
     * @test
     */
    public function callMediateWithoutDumpOptions(): void
    {
        $fileObjects = $this->mediator->mediate(
            [
                Args::CLASS_NAME => FunctionalEntity::class,
            ],
            $this->options

        );

        $this->assertFlushedFileObject($fileObjects);
    }

    /**
     * @test
     */
    public function callMediateWithNoTestOptions(): void
    {
        $this->options[Options::NO_TEST] = null;
        $fileObjects = $this->mediator->mediate(
            [
                Args::CLASS_NAME => FunctionalEntity::class,
            ],
            $this->options
        );

        $this->assertFlushedFileObject($fileObjects);
    }

    /**
     * @test
     */
    public function callMediateWithTestsOnlyOptions(): void
    {
        $this->options[Options::TESTS_ONLY] = null;
        $fileObjects = $this->mediator->mediate(
            [
                Args::CLASS_NAME => FunctionalEntity::class,
            ],
            $this->options
        );

        $this->assertFlushedFileObject($fileObjects);
    }
}
