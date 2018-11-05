<?php

namespace OpenClassrooms\CodeGenerator\FileObjects\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectType;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FileObjectFactoryImpl implements FileObjectFactory
{
    /**
     * @var string
     */
    private $baseNamespace;

    /**
     * @var string
     */
    private $testsBaseNamespace;

    /**
     * @var string
     */
    private $stubNamespace;

    use ClassNameUtility;

    public function create(string $type, string $className): FileObject
    {
        $fileObject = new FileObject();
        list($domain, $entity) = $this->getDomainAndEntityNameFromClassName($className);

        switch ($type) {
            case FileObjectType::API_VIEW_MODEL_ASSEMBLER:
                $fileObject->setClassName(
                    $this->baseNamespace . 'ViewModels\\' . $domain . '\\' . $entity . 'Assembler'
                );
                break;
            case FileObjectType::API_VIEW_MODEL_ASSEMBLER_TEST:
                $fileObject->setClassName(
                    $this->testsBaseNamespace . 'ViewModels\\' . $domain . '\\' . $entity . 'AssemblerTest'
                );
                break;
            case FileObjectType::API_VIEW_MODEL_ASSEMBLER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'AssemblerImpl'
                );
                break;
            case FileObjectType::API_VIEW_MODEL:
                $fileObject->setClassName($this->baseNamespace . 'ViewModels\\' . $domain . '\\' . $entity);
                break;
            case FileObjectType::API_VIEW_MODEL_DETAIL:
                $fileObject->setClassName($this->baseNamespace . 'ViewModels\\' . $domain . '\\' . $entity . 'Detail');
                break;
            case FileObjectType::API_VIEW_MODEL_DETAIL_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'DetailImpl'
                );
                break;
            case FileObjectType::API_VIEW_MODEL_LIST_ITEM:
                $fileObject->setClassName(
                    $this->baseNamespace . 'ViewModels\\' . $domain . '\\' . $entity . 'ListItem'
                );
                break;
            case FileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'ViewModels\\' . $domain . '\\Impl\\' . $entity . 'ListItemImpl'
                );
                break;
            case FileObjectType::API_VIEW_MODEL_STUB:
                $fileObject->setClassName($this->stubNamespace . $domain . '\\' . $entity . 'Stub');
                break;
            case FileObjectType::API_VIEW_MODEL_TEST_CASE:
                $fileObject->setClassName(
                    $this->stubNamespace . 'ViewModels\\' . $domain . '\\' . $entity . 'TestCase'
                );
                break;
            default:
                throw new \InvalidArgumentException($type);
        }

        return $fileObject;
    }

    public function setBaseNamespace(string $baseNamespace)
    {
        $this->baseNamespace = $baseNamespace;
    }

    public function setTestsBaseNamespace(string $testsBaseNamespace)
    {
        $this->testsBaseNamespace = $testsBaseNamespace;
    }

    public function setStubNamespace(string $stubNamespace)
    {
        $this->stubNamespace = $stubNamespace;
    }
}
