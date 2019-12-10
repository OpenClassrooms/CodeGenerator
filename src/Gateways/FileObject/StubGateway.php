<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Gateways\FileObject;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface StubGateway
{
    public function clear();

    public function insertAndIncrementSuffix(FileObject $fileObject);
}
