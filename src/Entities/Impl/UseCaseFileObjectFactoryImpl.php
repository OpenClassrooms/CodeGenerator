<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectType;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseFileObjectFactoryImpl extends AbstractFileObjectFactory implements UseCaseFileObjectFactory
{
    public function create(string $type, string $domain, string $entity, string $baseNamespace = null): FileObject
    {
        $this->baseNamespace = $baseNamespace ?? $this->baseNamespace;

        switch ($type) {
            case UseCaseFileObjectType::BUSINESS_RULES_USE_CASE:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\' . $this->prefix . $entity
                );
            case UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_TEST:
                return new FileObject(
                    $this->testsBaseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\' . $this->prefix . $entity . 'Test'
                );

            default:
                throw new \InvalidArgumentException($type);
        }
    }
}
