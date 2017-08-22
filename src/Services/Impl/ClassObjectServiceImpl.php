<?php

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\Services\ClassObjectService;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ClassObjectServiceImpl implements ClassObjectService
{
    use ClassNameUtility;

    /**
     * @var string
     */
    protected $appNamespace;

    /**
     * @var string
     */
    protected $baseNamespace;

    public function setAppNamespace(string $appNamespace)
    {
        $this->appNamespace = $appNamespace;
    }

    public function setBaseNamespace(string $baseNamespace)
    {
        $this->baseNamespace = $baseNamespace;
    }
}
