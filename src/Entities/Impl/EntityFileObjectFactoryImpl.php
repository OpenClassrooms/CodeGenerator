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
        $fileObject = new FileObject();

        $this->baseNamespace = $baseNamespace ?? $this->baseNamespace;

        switch ($type) {
            case EntityFileObjectType::BUSINESS_RULES_ENTITY:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\Entities\\' . $domain . '\\' . $entity
                );
                break;
            case EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\Gateways\\' . $domain . '\Exceptions\\' . $entity . 'NotFoundException'
                );
                break;
            case EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\Gateways\\' . $domain . '\\' . $entity . 'Gateway'
                );
                break;
            case EntityFileObjectType::BUSINESS_RULES_ENTITY_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . $this->appDir . 'Entity\\' . $domain . '\\' . $entity . 'Impl'
                );
                break;
            case EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB:
                $fileObject->setClassName(
                    $this->stubNamespace . 'BusinessRules\Entities\\' . $domain . '\\' . $entity . 'Stub1'
                );
                break;
        }

        return $fileObject;
    }
}
