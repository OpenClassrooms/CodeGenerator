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
            case ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Api\ViewModels\\' . $domain . '\\' . $entity . 'Assembler'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TEST:
                $fileObject->setClassName(
                    $this->testsBaseNamespace . 'Api\ViewModels\\' . $domain . '\\' . $entity . 'AssemblerTest'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Api\ViewModels\\' . $domain . '\\Impl\\' . $entity . 'AssemblerImpl'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL:
                $fileObject->setClassName($this->baseNamespace . 'Api\ViewModels\\' . $domain . '\\' . $entity);
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Api\ViewModels\\' . $domain . '\\' . $entity . 'Detail'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Api\ViewModels\\' . $domain . '\\Impl\\' . $entity . 'DetailImpl'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Api\ViewModels\\' . $domain . '\\' . $entity . 'ListItem'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Api\ViewModels\\' . $domain . '\\Impl\\' . $entity . 'ListItemImpl'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB:
                $fileObject->setClassName(
                    $this->stubNamespace . 'Api\ViewModels\\' . $domain . '\\' . $entity . 'DetailStub1'
                );
                break;
            case ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE:
                $fileObject->setClassName(
                    $this->stubNamespace . 'Api\ViewModels\\' . $domain . '\\' . $entity . 'TestCase'
                );
                break;
            default:
                throw new \InvalidArgumentException($type);
        }

        return $fileObject;
    }
}

