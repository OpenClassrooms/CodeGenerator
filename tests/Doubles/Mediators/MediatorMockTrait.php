<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Mediators;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
trait MediatorMockTrait
{
    /**
     * @param array $fileObjects
     */
    public function alreadyExistFileObject(): array
    {
        return array_map(
            function(FileObject $fileObject) {
                $otherFileObject = clone $fileObject;
                $otherFileObject->setAlreadyExists(true);

                return $otherFileObject;
            },
            self::$fileObjects
        );
    }

    /**
     * @param FileObject[]
     */
    protected function writeFileObjects(): array
    {
        return array_map(
            function(FileObject $fileObject) {
                $otherFileObject = clone $fileObject;
                $otherFileObject->write();

                return $otherFileObject;
            },
            self::$fileObjects
        );
    }
}
