<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityFileObjectFactoryImpl extends AbstractFileObjectFactory implements EntityFileObjectFactory
{
    public function create(string $type, string $domain, string $entity, string $baseNamespace = null): FileObject
    {
        $this->baseNamespace = $baseNamespace ?? $this->baseNamespace;

        switch ($type) {
            case EntityFileObjectType::BUSINESS_RULES_ENTITY:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Entities\\' . $domain . '\\' . $entity
                );
            case EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Gateways\\' . $domain . '\Exceptions\\' . $entity . 'NotFoundException'
                );
            case EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Gateways\\' . $domain . '\\' . $entity . 'Gateway'
                );
            case EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY:
                return new FileObject(
                    $this->stubNamespace . 'BusinessRules\Gateways\\' . $domain . '\\InMemory' . $entity . 'Gateway'
                );
            case EntityFileObjectType::BUSINESS_RULES_ENTITY_IMPL:
                return new FileObject(
                    $this->baseNamespace . $this->appDir . 'Entity\\' . $domain . '\\' . $entity . 'Impl'
                );
            case EntityFileObjectType::BUSINESS_RULES_ENTITY_REPOSITORY:
                return new FileObject(
                    $this->baseNamespace . $this->appDir . 'Repository\\' . $domain . '\\' . $entity . 'Repository'
                );
            case EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB:
                return new FileObject(
                    $this->stubNamespace . 'BusinessRules\Entities\\' . $domain . '\\' . $entity . 'Stub1'
                );

            default:
                throw new \InvalidArgumentException($type);
        }
    }
}
