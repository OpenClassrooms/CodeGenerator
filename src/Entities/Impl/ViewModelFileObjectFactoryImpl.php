<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectFactory;

class ViewModelFileObjectFactoryImpl extends AbstractFileObjectFactory implements ViewModelFileObjectFactory
{
    public function create(string $type, string $domain, string $entity, string $baseNamespace = null): FileObject
    {
        switch ($type) {
            case ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ViewModelAssemblerTrait'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ViewModelDetailAssembler'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_TEST:
                return new FileObject(
                    $this->testsBaseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ViewModelDetailAssemblerTest'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ViewModelListItemAssembler'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_TEST:
                return new FileObject(
                    $this->testsBaseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ViewModelListItemAssemblerTest'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ViewModel'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_IMPL:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'ViewModelImpl'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ViewModelDetail'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'ViewModelDetailImpl'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ViewModelListItem'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'ViewModelListItemImpl'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB:
                return new FileObject(
                    $this->stubNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ViewModelDetailStub1'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB:
                return new FileObject(
                    $this->stubNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ViewModelListItemStub1'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_TEST_CASE:
                return new FileObject(
                    $this->stubNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ViewModelListItemTestCase'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE:
                return new FileObject(
                    $this->stubNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ViewModelTestCase'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE:
                return new FileObject(
                    $this->stubNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ViewModelDetailTestCase'
                );

            default:
                throw new \InvalidArgumentException($type);
        }
    }
}

