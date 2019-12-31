<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\ModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ModelFileObjectType;

class ModelFileObjectFactoryImpl extends AbstractFileObjectFactory implements ModelFileObjectFactory
{
    public function create(string $type, string $domain, string $entity): FileObject
    {
        switch ($type) {
            case ModelFileObjectType::MODEL_ENTITY_TRAIT:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'Models\\' . $domain . '\\' . $entity . 'ModelTrait'
                );
            case ModelFileObjectType::MODEL_PATCH_ENTITY:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'Models\\' . $domain . '\\Patch' . $entity . 'Model'
                );
            case ModelFileObjectType::MODEL_POST_ENTITY:
                return new FileObject(
                    $this->baseNamespace . $this->appDir . 'Models\\' . $domain . '\\Post' . $entity . 'Model'
                );
            default:
                throw new \InvalidArgumentException($type);
        }
    }
}
