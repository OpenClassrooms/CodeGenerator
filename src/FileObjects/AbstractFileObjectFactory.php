<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\FileObjects;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class AbstractFileObjectFactory implements FileObjectFactory
{
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

    public function setStubNamespace(string $stubNamespace)
    {
        $this->stubNamespace = $stubNamespace;
    }

    public function setTestsBaseNamespace(string $testsBaseNamespace)
    {
        $this->testsBaseNamespace = $testsBaseNamespace;
    }
}
