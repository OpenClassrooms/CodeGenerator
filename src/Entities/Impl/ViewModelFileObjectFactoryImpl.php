<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectFactory;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelFileObjectFactoryImpl extends AbstractFileObjectFactory implements ViewModelFileObjectFactory
{
    public function create(string $type, string $domain, string $entity, string $baseNamespace = null): FileObject
    {
        switch ($type) {
            case ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'AssemblerTrait'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'DetailAssembler'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL_TEST:
                return new FileObject(
                    $this->testsBaseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'DetailAssemblerImplTest'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'DetailAssemblerImpl'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ListItemAssembler'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL_TEST:
                return new FileObject(
                    $this->testsBaseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'ListItemAssemblerImplTest'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'ListItemAssemblerImpl'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_IMPL:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'Impl'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'Detail'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'DetailImpl'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ListItem'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL:
                return new FileObject(
                    $this->baseNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'ListItemImpl'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB:
                return new FileObject(
                    $this->stubNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'DetailStub1'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB:
                return new FileObject(
                    $this->stubNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ListItemStub1'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_TEST_CASE:
                return new FileObject(
                    $this->stubNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'ListItemTestCase'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE:
                return new FileObject(
                    $this->stubNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'TestCase'
                );
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE:
                return new FileObject(
                    $this->stubNamespace . $this->apiDir . 'ViewModels\\' . $domain . '\\' . $entity . 'DetailTestCase'
                );

            default:
                throw new \InvalidArgumentException($type);
        }
    }
}

