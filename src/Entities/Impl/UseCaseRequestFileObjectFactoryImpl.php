<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseRequestFileObjectFactoryImpl extends AbstractFileObjectFactory implements UseCaseRequestFileObjectFactory
{
    public function create(string $type, string $domain, string $entity, string $baseNamespace = null): FileObject
    {
        $this->baseNamespace = $baseNamespace ?? $this->baseNamespace;

        switch ($type) {
            case UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\' . $entity . 'Request'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\' . $entity . 'RequestBuilder'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\' . $entity . 'RequestBuilderImpl'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_DTO:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\' . $entity . 'RequestDTO'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Get' . $entity . 'Request'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Get' . $entity . 'RequestBuilder'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\Get' . $entity . 'RequestBuilderImpl'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_DTO:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\Get' . $entity . 'RequestDTO'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Get' . StringUtility::pluralize($entity) . 'Request'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\Get' . StringUtility::pluralize($entity) . 'RequestBuilder'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\Get' . StringUtility::pluralize($entity) . 'RequestBuilderImpl'
                );
            case UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_DTO:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\Get' . StringUtility::pluralize($entity) . 'RequestDTO'
                );

            default:
                throw new \InvalidArgumentException($type);
        }
    }
}
