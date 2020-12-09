<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectFactory;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

class UseCaseRequestFileObjectFactoryImpl extends AbstractFileObjectFactory implements UseCaseRequestFileObjectFactory
{
    public function create(string $type, string $domain, string $entity, string $baseNamespace = null): FileObject
    {
        $this->baseNamespace = $baseNamespace ?? $this->baseNamespace;

        switch ($type) {
            case UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Create' . $entity . 'Request'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Create' . $entity . 'RequestBuilder'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\Create' . $entity . 'RequestBuilderImpl'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_DTO:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\Create' . $entity . 'RequestDTO'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Delete' . $entity . 'Request'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_BUILDER:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Delete' . $entity . 'RequestBuilder'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\Delete' . $entity . 'RequestBuilderImpl'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_DTO:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\Delete' . $entity . 'RequestDTO'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_ENTITY_USE_CASE_COMMON_REQUEST:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\' . $entity . 'CommonRequest'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Edit' . $entity . 'Request'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_BUILDER:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Edit' . $entity . 'RequestBuilder'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\Edit' . $entity . 'RequestBuilderImpl'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_DTO:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\Edit' . $entity . 'RequestDTO'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\Request\\' . $entity . 'Request'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Get' . $entity . 'Request'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Get' . $entity . 'RequestBuilder'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_DTO:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\Get' . $entity . 'RequestDTO'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Get' . StringUtility::pluralize(
                        $entity
                    ) . 'Request'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Get' . StringUtility::pluralize(
                        $entity
                    ) . 'RequestBuilder'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\Get' . StringUtility::pluralize(
                        $entity
                    ) . 'RequestBuilderImpl'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_DTO:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\Get' . StringUtility::pluralize(
                        $entity
                    ) . 'RequestDTO'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_REQUEST_TRAIT:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\CreateRequestTrait'
                );

            default:
                throw new \InvalidArgumentException($type);
        }
    }
}
