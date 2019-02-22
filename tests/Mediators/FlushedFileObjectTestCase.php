<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait FlushedFileObjectTestCase
{
    /**
     * @param FileObject[]
     */
    private function assertFlushedFileObject($fileObjects): void
    {
        $this->assertNotEmpty(InMemoryFileObjectGateway::$flushedFileObjects);
        $this->assertCount(count(InMemoryFileObjectGateway::$flushedFileObjects), $fileObjects);
        foreach ($fileObjects as $fileObject) {
            /** @var FileObject $fileObject */
            $this->assertArrayHasKey($fileObject->getClassName(), InMemoryFileObjectGateway::$flushedFileObjects);
        }
    }
}
