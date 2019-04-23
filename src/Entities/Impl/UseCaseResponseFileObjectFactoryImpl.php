<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseFileObjectFactoryImpl extends AbstractFileObjectFactory implements UseCaseResponseFileObjectFactory
{
    public function create(string $type, string $domain, string $entity, string $baseNamespace = null): FileObject
    {
        $fileObject = new FileObject();

        $this->baseNamespace = $baseNamespace ?? $this->baseNamespace;

        switch ($type) {
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'ResponseDTO'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'DetailResponseDTO'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'ListItemResponseDTO'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_STUB:
                $fileObject->setClassName(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ResponseStub1'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB:
                $fileObject->setClassName(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'DetailResponseStub1'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB:
                $fileObject->setClassName(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ListItemResponseStub1'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'Response'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'DetailResponse'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ListItemResponse'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'DetailResponseAssembler'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'DetailResponseAssemblerImpl'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ListItemResponseAssembler'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'ListItemResponseAssemblerImpl'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_TRAIT:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'ResponseTrait'
                );
                break;
            default:
                throw new \InvalidArgumentException($type);
        }

        return $fileObject;
    }
}
