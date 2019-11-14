<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Gateways\FileObject;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface StubGateway
{
    public function insertAndIncrementSuffix(FileObject $fileObject);

    public function clear();
}
