<?php

namespace OpenClassrooms\CodeGenerator\FileObjects;

use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class AbstractFileObjectFactory implements FileObjectFactory
{
    use ClassNameUtility;

    /**
     * @var string
     */
    protected $baseNamespace;

    /**
     * @var string
     */
    protected $stubNamespace;

    /**
     * @var string
     */
    protected $testsBaseNamespace;

    public function setBaseNamespace(string $baseNamespace)
    {
        $this->baseNamespace = $baseNamespace;
    }

    public function setTestsBaseNamespace(string $testsBaseNamespace)
    {
        $this->testsBaseNamespace = $testsBaseNamespace;
    }

    public function setStubNamespace(string $stubNamespace)
    {
        $this->stubNamespace = $stubNamespace;
    }
}
