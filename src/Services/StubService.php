<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface StubService
{
    public function setFakeValuesToFields(array $responseFields, FileObject $fileObject): array;

    public function setNameAndStubValues(array $responseFields, FileObject $fileObject): array;
}

