<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\FileObjects\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelFileObjectFactoryImpl extends AbstractFileObjectFactory implements ViewModelFileObjectFactory
{
    public function create(string $type, string $domain, string $entity): FileObject
    {
        $fileObject = new FileObject();

        switch ($type) {
            case ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT:
                $fileObject->setClassName(
                    $this->baseNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\' . $entity . 'AssemblerTrait'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER:
                $fileObject->setClassName(
                    $this->baseNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\' . $entity . 'DetailAssembler'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL_TEST:
                $fileObject->setClassName(
                    $this->testsBaseNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'DetailAssemblerImplTest'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'DetailAssemblerImpl'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER:
                $fileObject->setClassName(
                    $this->baseNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\' . $entity . 'ListItemAssembler'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL_TEST:
                $fileObject->setClassName(
                    $this->testsBaseNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'ListItemAssemblerImplTest'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'ListItemAssemblerImpl'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL:
                $fileObject->setClassName(
                    $this->baseNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\' . $entity
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'Impl'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL:
                $fileObject->setClassName(
                    $this->baseNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\' . $entity . 'Detail'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'DetailImpl'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM:
                $fileObject->setClassName(
                    $this->baseNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\' . $entity . 'ListItem'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'ListItemImpl'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB:
                $fileObject->setClassName(
                    $this->stubNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\' . $entity . 'DetailStub1'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB:
                $fileObject->setClassName(
                    $this->stubNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\' . $entity . 'ListItemStub1'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_TEST_CASE:
                $fileObject->setClassName(
                    $this->stubNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\' . $entity . 'ListItemTestCase'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE:
                $fileObject->setClassName(
                    $this->stubNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\' . $entity . 'TestCase'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE:
                $fileObject->setClassName(
                    $this->stubNamespace . $this->apiDirName . 'ViewModels\\' . $domain . '\\' . $entity . 'DetailTestCase'
                );
                break;
            default:
                throw new \InvalidArgumentException($type);
        }

        return $fileObject;
    }
}

