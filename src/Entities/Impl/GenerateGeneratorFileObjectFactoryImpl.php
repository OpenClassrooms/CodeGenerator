<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\GenerateGeneratorFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\GenerateGeneratorFileObjectType;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenerateGeneratorFileObjectFactoryImpl extends AbstractFileObjectFactory implements GenerateGeneratorFileObjectFactory
{
    public function create(string $type, string $domain, string $entity): FileObject
    {
        $fileObject = new FileObject();

        switch ($type) {
            case GenerateGeneratorFileObjectType::FILE_OBJECT_STUB:
                $fileObject->setClassName(
                    $this->stubNamespace . 'Entities\\' . $domain . '\\' . $entity . 'FileObjectStub1'
                );
                break;
            case GenerateGeneratorFileObjectType::GENERATOR:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Generator\\' . $domain . '\\' . $entity . 'Generator'
                );
                break;
            case GenerateGeneratorFileObjectType::GENERATOR_REQUEST:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Generator\\' . $domain . '\Request\\' . $entity . 'GeneratorRequest'
                );
                break;
            case GenerateGeneratorFileObjectType::GENERATOR_REQUEST_BUILDER:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Generator\\' . $domain . '\Request\\' . $entity . 'GeneratorRequestBuilder'
                );
                break;
            case GenerateGeneratorFileObjectType::GENERATOR_REQUEST_BUILDER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Generator\\' . $domain . '\DTO\Request\\' . $entity . 'GeneratorRequestBuilderImpl'
                );
                break;
            case GenerateGeneratorFileObjectType::GENERATOR_REQUEST_DTO:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Generator\\' . $domain . '\DTO\Request\\' . $entity . 'GeneratorRequestDTO'
                );
                break;
            case GenerateGeneratorFileObjectType::GENERATOR_TEST:
                $fileObject->setClassName(
                    $this->testsBaseNamespace . 'Generator\\' . $domain . '\\' . $entity . 'GeneratorTest'
                );
                break;
            case GenerateGeneratorFileObjectType::SKELETON:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Skeleton\\' . $domain . '\\' . $entity . '.php.twig'
                );
                break;
            case GenerateGeneratorFileObjectType::SKELETON_MODEL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\\' . $entity . 'SkeletonModel'
                );
                break;
            case GenerateGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER:
                $fileObject->setClassName(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\\' . $entity . 'SkeletonModelAssembler'
                );
                break;
            case GenerateGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\Impl\\' . $entity . 'SkeletonModelAssemblerImpl'
                );
                break;
            case GenerateGeneratorFileObjectType::SKELETON_MODEL_BUILDER:
                $fileObject->setClassName(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\\' . $entity . 'SkeletonModelBuilder'
                );
                break;
            case GenerateGeneratorFileObjectType::SKELETON_MODEL_BUILDER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\Impl\\' . $entity . 'SkeletonModelBuilderImpl'
                );
                break;
            case GenerateGeneratorFileObjectType::SKELETON_MODEL_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\Impl\\' . $entity . 'SkeletonModelImpl'
                );
                break;
        }

        return $fileObject;
    }
}
