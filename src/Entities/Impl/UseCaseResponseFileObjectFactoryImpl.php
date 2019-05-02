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
        $this->baseNamespace = $baseNamespace ?? $this->baseNamespace;

        switch ($type) {
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'ResponseDTO'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'DetailResponseDTO'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'ListItemResponseDTO'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_STUB:
                return new FileObject(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ResponseStub1'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB:
                return new FileObject(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'DetailResponseStub1'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB:
                return new FileObject(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ListItemResponseStub1'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'Response'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'DetailResponse'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ListItemResponse'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'DetailResponseAssembler'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'DetailResponseAssemblerImpl'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ListItemResponseAssembler'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'ListItemResponseAssemblerImpl'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_TRAIT:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'ResponseTrait'
                );

            default:
                throw new \InvalidArgumentException($type);
        }
    }
}
