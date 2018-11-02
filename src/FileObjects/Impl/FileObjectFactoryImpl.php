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

    use ClassNameUtility;

    public function create(string $type, string $className): FileObject
    {
        $fileObject = new FileObject();
        list($domain, $entity) = $this->getDomainAndEntityNameFromClassName($className);

        switch ($type) {
            case FileObjectType::API_VIEW_MODEL_ASSEMBLER:
                $fileObject->setClassName($this->baseNamespace.'ViewModels\\'.$domain.'\\'.$entity.'Assembler');
                break;
            case FileObjectType::API_VIEW_MODEL_ASSEMBLER_TEST:
                $fileObject->setClassName(
                    $this->testsBaseNamespace.'ViewModels\\'.$domain.'\\'.$entity.'AssemblerTest'
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
}
