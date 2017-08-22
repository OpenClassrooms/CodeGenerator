<?php

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\ClassObjects\ClassObject;
use OpenClassrooms\CodeGenerator\Services\EntityClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class EntityClassObjectServiceImpl extends ClassObjectServiceImpl implements EntityClassObjectService
{

    public function getEntityFromClassName(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject($this->baseNamespace.'\\BusinessRules\\Entities\\'.$domain, $entityName, false, true);
    }

    public function getGatewayFromClassName(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject($this->baseNamespace.'\\BusinessRules\\Gateways\\'.$domain, $entityName.'Gateway', true);
    }

    public function getRepository(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject($this->appNamespace.'\\Repository\\'.$domain, $entityName.'Repository', true);
    }

    public function getEntityNotFoundException(string $className): ClassObject
    {
        list($domain, $entityName) = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->baseNamespace.'\\BusinessRules\\Gateways\\'.$domain, $entityName.'NotFoundException'
        );
    }
}
