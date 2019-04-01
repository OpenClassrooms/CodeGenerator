<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectType;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseFileObjectFactoryImpl extends AbstractFileObjectFactory implements UseCaseFileObjectFactory
{
    public function create(string $type, string $domain, string $entity, string $baseNamespace = null): FileObject
    {
        $fileObject = new FileObject();

        $this->baseNamespace = $baseNamespace ?? $this->baseNamespace;

        switch ($type) {
            case UseCaseFileObjectType::BUSINESS_RULES_USE_CASE:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\' . $entity
                );
                break;
            case UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\' . $entity . 'Request'
                );
                break;
            case UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\Requestors\\' . $domain . '\\' . $entity . 'RequestBuilder'
                );
                break;
            case UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\' . $entity . 'RequestBuilderImpl'
                );
                break;
            case UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_DTO:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\' . $entity . 'RequestDTO'
                );
                break;
            case UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_TEST:
                $fileObject->setClassName(
                    $this->testsBaseNamespace . 'BusinessRules\UseCases\\' . $domain . '\\' . $entity . 'Test'
                );
                break;
        }

        return $fileObject;
    }
}
