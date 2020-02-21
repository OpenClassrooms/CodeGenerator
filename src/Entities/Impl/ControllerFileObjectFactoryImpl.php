<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\ControllerFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ControllerFileObjectType;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

class ControllerFileObjectFactoryImpl extends AbstractFileObjectFactory implements ControllerFileObjectFactory
{
    public function create(string $type, string $domain, string $entity): FileObject
    {
        switch ($type) {
            case ControllerFileObjectType::API_CONTROLLER_DELETE_ENTITY:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'Controller\\' . $domain . '\\Delete' . $entity . 'Controller'
                );
            case ControllerFileObjectType::API_CONTROLLER_GET_ENTITIES:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'Controller\\' . $domain . '\\Get' . StringUtility::pluralize(
                        $entity
                    ) . 'Controller'
                );
            case ControllerFileObjectType::API_CONTROLLER_GET_ENTITY:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'Controller\\' . $domain . '\\Get' . $entity . 'Controller'
                );
            case ControllerFileObjectType::API_CONTROLLER_PATCH_ENTITY:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'Controller\\' . $domain . '\\Patch' . $entity . 'Controller'
                );
            case ControllerFileObjectType::API_CONTROLLER_POST_ENTITY:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'Controller\\' . $domain . '\\Post' . $entity . 'Controller'
                );
            default:
                throw new \InvalidArgumentException($type);
        }
    }
}
