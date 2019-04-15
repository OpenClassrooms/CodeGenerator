<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseRequestFileObjectFactoryImpl extends AbstractFileObjectFactory implements UseCaseRequestFileObjectFactory
{
    public function create(string $type, string $domain, string $entity, string $baseNamespace = null): FileObject
    {
        $fileObject = new FileObject();

        $this->baseNamespace = $baseNamespace ?? $this->baseNamespace;

        switch ($type) {
            case UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\' . $this->prefix . $entity . 'Request'
                );
                break;
            case UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\' . $this->prefix . $entity . 'RequestBuilder'
                );
                break;
            case UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\' . $this->prefix . $entity . 'RequestBuilderImpl'
                );
                break;
            case UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_DTO:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\' . $this->prefix . $entity . 'RequestDTO'
                );
                break;
        }

        return $fileObject;
    }
}
