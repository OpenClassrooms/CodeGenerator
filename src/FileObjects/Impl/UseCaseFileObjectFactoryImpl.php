<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\FileObjects\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectType;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseFileObjectFactoryImpl extends AbstractFileObjectFactory implements UseCaseFileObjectFactory
{
    public function create(string $type, string $domain, string $entity): FileObject
    {
        $fileObject = new FileObject();

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
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Request\\' . $entity . 'RequestBuilderDTO'
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
