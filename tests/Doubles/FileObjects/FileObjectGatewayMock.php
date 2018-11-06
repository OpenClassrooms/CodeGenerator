<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects;

use OpenClassrooms\CodeGenerator\Gateway\Impl\FileObjectGatewayImpl;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class FileObjectGatewayMock extends FileObjectGatewayImpl
{
    const GENERATED_FILE_DIR = __DIR__ . '/../../Fixtures/GeneratedFiles/';

    protected $generatedFileDir = self::GENERATED_FILE_DIR;

}
