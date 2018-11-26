<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\FileObjects\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EntityFileObjectFactoryImpl extends AbstractFileObjectFactory implements EntityFileObjectFactory
{
    public function create(string $type, string $domain, string $entity): FileObject
    {
        $fileObject = new FileObject();

        switch ($type) {
            case EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB:
                $fileObject->setClassName(
                    $this->stubNamespace . 'BusinessRules\Entities\\' . $domain . '\\' . $entity . 'Stub1'
            );
                break;
        }

        return $fileObject;
    }
}
