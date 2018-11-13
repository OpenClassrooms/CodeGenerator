<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\FileObjects\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseFileObjectFactoryImpl extends AbstractFileObjectFactory implements UseCaseResponseFileObjectFactory
{
    public function create(string $type, string $domain, string $entity): FileObject
    {
        $fileObject = new FileObject();

        switch ($type) {
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'ResponseDTO'
                );
                break;
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE:
                $fileObject->setClassName(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'DetailResponseDTO'
                );
                break;
            default:
                throw new \InvalidArgumentException($type);
        }

        return $fileObject;
    }
}
