<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\SelfGeneratorFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\SelfGeneratorFileObjectType;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class SelfGeneratorFileObjectFactoryImpl extends AbstractFileObjectFactory implements SelfGeneratorFileObjectFactory
{
    public function create(string $type, string $domain, string $entity): FileObject
    {
        $fileObject = new FileObject();

        switch ($type) {
            case SelfGeneratorFileObjectType::FILE_OBJECT_STUB:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Doubles\Entities\\' . $domain . '\\' . $entity . 'FileObjectStub1'
                );
                break;
            case SelfGeneratorFileObjectType::GENERATOR:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Generator\\' . $domain . '\\' . $entity . 'Generator'
                );
                break;
            case SelfGeneratorFileObjectType::GENERATOR_REQUEST:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Generator\\' . $domain . '\Request\\' . $entity . 'GeneratorRequest'
                );
                break;
            case SelfGeneratorFileObjectType::GENERATOR_REQUEST_BUILDER:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Generator\\' . $domain . '\Request\\' . $entity . 'GeneratorRequestBuilder'
                );
                break;
            case SelfGeneratorFileObjectType::GENERATOR_REQUEST_BUILDER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Generator\\' . $domain . '\DTO\Request\\' . $entity . 'GeneratorRequestBuilderImpl'
                );
                break;
            case SelfGeneratorFileObjectType::GENERATOR_REQUEST_DTO:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Generator\\' . $domain . '\DTO\Request\\' . $entity . 'GeneratorRequestDTO'
                );
                break;
            case SelfGeneratorFileObjectType::GENERATOR_TEST:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Generator\\' . $domain . '\\' . $entity . 'GeneratorTest'
                );
                break;
            case SelfGeneratorFileObjectType::SKELETON:
                $fileObject->setClassName(
                    $this->baseNamespace . 'Skeleton\\' . $domain . '\\' . $entity . '.php.twig'
                );
                break;
            case SelfGeneratorFileObjectType::SKELETON_MODEL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\\' . $entity . 'SkeletonModel'
                );
                break;
            case SelfGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER:
                $fileObject->setClassName(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\\' . $entity . 'SkeletonModelAssembler'
                );
                break;
            case SelfGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\Impl\\' . $entity . 'SkeletonModelAssemblerImpl'
                );
                break;
            case SelfGeneratorFileObjectType::SKELETON_MODEL_BUILDER:
                $fileObject->setClassName(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\\' . $entity . 'SkeletonModelBuilder'
                );
                break;
            case SelfGeneratorFileObjectType::SKELETON_MODEL_BUILDER_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\Impl\\' . $entity . 'SkeletonModelBuilderImpl'
                );
                break;
            case SelfGeneratorFileObjectType::SKELETON_MODEL_IMPL:
                $fileObject->setClassName(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\Impl\\' . $entity . 'SkeletonModelImpl'
                );
                break;
        }

        return $fileObject;
    }
}
