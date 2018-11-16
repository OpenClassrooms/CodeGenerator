<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\OldClassObjects\ClassObject;
use OpenClassrooms\CodeGenerator\Services\EntityClassObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class EntityClassObjectServiceImpl extends ClassObjectServiceImpl implements EntityClassObjectService
{
    public function getEntityFromClassName(string $className): ClassObject
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject($this->baseNamespace . '\\BusinessRules\\Entities\\' . $domain, $entityName, false, true);
    }

    public function getEntityNotFoundException(string $className): ClassObject
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject(
            $this->baseNamespace . '\\BusinessRules\\Gateways\\' . $domain,
            $entityName . 'NotFoundException'
        );
    }

    public function getGatewayFromClassName(string $className): ClassObject
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject($this->baseNamespace . '\\BusinessRules\\Gateways\\' . $domain, $entityName . 'Gateway', true);
    }

    public function getRepository(string $className): ClassObject
    {
        [$domain, $entityName] = $this->getDomainAndEntityNameFromClassName($className);

        return new ClassObject($this->appNamespace . '\\Repository\\' . $domain, $entityName . 'Repository', true);
    }
}
