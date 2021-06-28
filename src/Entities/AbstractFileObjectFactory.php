<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities;

abstract class AbstractFileObjectFactory
{
    protected string $apiDir;

    protected string $appDir;

    protected string $baseNamespace;

    protected string $stubNamespace;

    protected string $testsBaseNamespace;

    public function setBaseNamespace(string $baseNamespace)
    {
        $this->baseNamespace = $baseNamespace;
    }

    public function setApiDir(string $apiDir)
    {
        $this->apiDir = $apiDir;
    }

    public function setAppDir(string $appDir)
    {
        $this->appDir = $appDir;
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
