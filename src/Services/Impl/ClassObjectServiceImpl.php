<?php

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;
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

    public function getEntityNotFoundException(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->baseNamespace.'\\BusinessRules\\Gateways\\'.$domain, $entityName.'NotFoundException'
        );
    }

    public function setAppNamespace(string $appNamespace)
    {
        $this->appNamespace = $appNamespace;
    }

    public function setBaseNamespace(string $baseNamespace)
    {
        $this->baseNamespace = $baseNamespace;
    }
}
