<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\GenerateGeneratorFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\GenerateGeneratorFileObjectType;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenerateGeneratorFileObjectFactoryImpl extends AbstractFileObjectFactory implements GenerateGeneratorFileObjectFactory
{
    public function create(string $type, string $domain, string $entity): FileObject
    {
        switch ($type) {
            case GenerateGeneratorFileObjectType::FILE_OBJECT_STUB:
                return new FileObject(
                    $this->stubNamespace . 'Entities\\' . $domain . '\\' . $entity . 'FileObjectStub1'
                );
            case GenerateGeneratorFileObjectType::GENERATOR:
                return new FileObject(
                    $this->baseNamespace . 'Generator\\' . $domain . '\\' . $entity . 'Generator'
                );
            case GenerateGeneratorFileObjectType::GENERATOR_REQUEST:
                return new FileObject(
                    $this->baseNamespace . 'Generator\\' . $domain . '\Request\\' . $entity . 'GeneratorRequest'
                );
            case GenerateGeneratorFileObjectType::GENERATOR_REQUEST_BUILDER:
                return new FileObject(
                    $this->baseNamespace . 'Generator\\' . $domain . '\Request\\' . $entity . 'GeneratorRequestBuilder'
                );
            case GenerateGeneratorFileObjectType::GENERATOR_REQUEST_BUILDER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'Generator\\' . $domain . '\DTO\Request\\' . $entity . 'GeneratorRequestBuilderImpl'
                );
            case GenerateGeneratorFileObjectType::GENERATOR_REQUEST_DTO:
                return new FileObject(
                    $this->baseNamespace . 'Generator\\' . $domain . '\DTO\Request\\' . $entity . 'GeneratorRequestDTO'
                );
            case GenerateGeneratorFileObjectType::GENERATOR_TEST:
                return new FileObject(
                    $this->testsBaseNamespace . 'Generator\\' . $domain . '\\' . $entity . 'GeneratorTest'
                );
            case GenerateGeneratorFileObjectType::SKELETON:
                return new FileObject(
                    $this->baseNamespace . 'Skeleton\\' . $domain . '\\' . $entity . '.php.twig'
                );
            case GenerateGeneratorFileObjectType::SKELETON_MODEL:
                return new FileObject(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\\' . $entity . 'SkeletonModel'
                );
            case GenerateGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER:
                return new FileObject(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\\' . $entity . 'SkeletonModelAssembler'
                );
            case GenerateGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\Impl\\' . $entity . 'SkeletonModelAssemblerImpl'
                );
            case GenerateGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER_MOCK:
                return new FileObject(
                    $this->stubNamespace . 'SkeletonModels\\' . $domain . '\\' . $entity . 'SkeletonModelAssemblerMock'
                );
            case GenerateGeneratorFileObjectType::SKELETON_MODEL_BUILDER:
                return new FileObject(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\\' . $entity . 'SkeletonModelBuilder'
                );
            case GenerateGeneratorFileObjectType::SKELETON_MODEL_BUILDER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\Impl\\' . $entity . 'SkeletonModelBuilderImpl'
                );
            case GenerateGeneratorFileObjectType::SKELETON_MODEL_BUILDER_MOCK:
                return new FileObject(
                    $this->stubNamespace . 'SkeletonModels\\' . $domain . '\\' . $entity . 'SkeletonModelBuilderMock'
                );
            case GenerateGeneratorFileObjectType::SKELETON_MODEL_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'SkeletonModels\\' . $domain . '\Impl\\' . $entity . 'SkeletonModelImpl'
                );
            case GenerateGeneratorFileObjectType::SERVICE_XML:
                return new FileObject(
                    $this->baseNamespace . 'Resources\config\Generator\\' . $domain . '\\' . StringUtility::convertToLowerSnakeCase(
                        $entity
                    ) . 'generator.xml'
                );

            default:
                throw new \InvalidArgumentException($type);
        }
    }
}
