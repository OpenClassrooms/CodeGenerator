<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

class UseCaseFileObjectFactoryImpl extends AbstractFileObjectFactory implements UseCaseFileObjectFactory
{
    public function create(string $type, string $domain, string $entity, string $baseNamespace = null): FileObject
    {
        $this->baseNamespace = $baseNamespace ?? $this->baseNamespace;

        switch ($type) {
            case UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\Create' . $entity
                );
            case UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_TEST:
                return new FileObject(
                    $this->testsBaseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\Create' . $entity . 'Test'
                );
            case UseCaseFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\Delete' . $entity
                );
            case UseCaseFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_TEST:
                return new FileObject(
                    $this->testsBaseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\Delete' . $entity . 'Test'
                );
            case UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\Edit' . $entity
                );
            case UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_TEST:
                return new FileObject(
                    $this->testsBaseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\Edit' . $entity . 'Test'
                );
            case UseCaseFileObjectType::BUSINESS_RULES_USE_CASE:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\' . $entity
                );
            case UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_TEST:
                return new FileObject(
                    $this->testsBaseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\' . $entity . 'Test'
                );
            case UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\Get' . $entity
                );
            case UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_TEST:
                return new FileObject(
                    $this->testsBaseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\Get' . $entity . 'Test'
                );
            case UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\Get' . StringUtility::pluralize(
                        $entity
                    )
                );
            case UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_TEST:
                return new FileObject(
                    $this->testsBaseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\Get' . StringUtility::pluralize(
                        $entity
                    ) . 'Test'
                );

            default:
                throw new \InvalidArgumentException($type);
        }
    }
}
