<?php

namespace OpenClassrooms\CodeGenerator\FileObjects;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface FileObjectFactory
{
    public function setBaseNamespace(string $baseNamespace);

    public function setTestsBaseNamespace(string $testsBaseNamespace);

    public function setStubNamespace(string $stubNamespace);
}
