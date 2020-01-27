<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Commands\ConstructionPatternType;
use OpenClassrooms\CodeGenerator\Entities\GenerateGeneratorFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\GenerateGeneratorFileObjectType;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\GenerateGeneratorGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Services\TemplatingService;
use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\GenerateGeneratorGeneratorSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\GenerateGeneratorGeneratorSkeletonModelAssembler;

class GenerateGeneratorGenerator
{
    /**
     * @var GenerateGeneratorGeneratorSkeletonModelAssembler
     */
    private $assembler;

    /**
     * @var GenerateGeneratorFileObjectFactory
     */
    private $factory;

    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @var GenerateGeneratorGeneratorSkeletonModel
     */
    private $skeletonModel;

    /**
     * @var TemplatingService
     */
    private $templating;

    /**
     * @param GenerateGeneratorGeneratorRequest $generatorRequest
     *
     * @return FileObject
     */
    public function generate(GeneratorRequest $generatorRequest): array
    {
        $this->buildSkeletonModel(
            $generatorRequest->getDomain(),
            $generatorRequest->getEntity(),
            $generatorRequest->getConstructionPattern()
        );
        $fileObjects = $this->buildFileObjects(
            $generatorRequest->getDomain(),
            $generatorRequest->getEntity(),
            $generatorRequest->getConstructionPattern()
        );

        $this->insertFileObjects($fileObjects);

        return $fileObjects;
    }

    private function buildSkeletonModel(
        string $domain,
        string $entity,
        string $constructionPattern
    ): GenerateGeneratorGeneratorSkeletonModel {
        return $this->skeletonModel = $this->assembler->create($domain, $entity, $constructionPattern);
    }

    /**
     * @return FileObject[]
     */
    private function buildFileObjects(string $domain, string $entity, string $constructionPattern): array
    {
        $fileObjects = [];
        $fileObjects[] = $this->buildGeneratorFileObject($domain, $entity);
        $fileObjects[] = $this->buildGeneratorFileObjectStubFileObject($domain, $entity);
        $fileObjects[] = $this->buildGeneratorRequestFileObject($domain, $entity);
        $fileObjects[] = $this->buildGeneratorRequestBuilderFileObject($domain, $entity);
        $fileObjects[] = $this->buildGeneratorRequestBuilderImplFileObject($domain, $entity);
        $fileObjects[] = $this->buildGeneratorRequestDTOFileObject($domain, $entity);
        $fileObjects[] = $this->buildGeneratorTestFileObject($domain, $entity);
        $fileObjects[] = $this->buildSkeletonFileObject($domain, $entity);
        $fileObjects[] = $this->buildSkeletonModelFileObject($domain, $entity);

        if (ConstructionPatternType::ASSEMBLER_PATTERN === $constructionPattern) {
            $fileObjects[] = $this->buildSkeletonModelAssemblerFileObject($domain, $entity);
            $fileObjects[] = $this->buildSkeletonModelAssemblerImplFileObject($domain, $entity);
            $fileObjects[] = $this->buildSkeletonModelAssemblerMockFileObject($domain, $entity);
        } else {
            $fileObjects[] = $this->buildSkeletonModelBuilderFileObject($domain, $entity);
            $fileObjects[] = $this->buildSkeletonModelBuilderImplFileObject($domain, $entity);
            $fileObjects[] = $this->buildSkeletonModelBuilderMockFileObject($domain, $entity);
        }
        $fileObjects[] = $this->buildSkeletonModelImplFileObject($domain, $entity);
        $fileObjects[] = $this->buildServiceXmlFileObject($domain, $entity);

        return $fileObjects;
    }

    private function buildGeneratorFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::GENERATOR,
            'GenerateGenerator/GenerateGenerator.php.twig'
        );
    }

    private function buildFileObject(string $domain, string $entity, string $type, string $template): FileObject
    {
        $fileObject = $this->factory->create($type, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                $template,
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildGeneratorFileObjectStubFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::FILE_OBJECT_STUB,
            'GenerateGenerator/GenerateGeneratorFileObjectStub.php.twig'
        );
    }

    private function buildGeneratorRequestFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::GENERATOR_REQUEST,
            'GenerateGenerator/GenerateGeneratorRequest.php.twig'
        );
    }

    private function buildGeneratorRequestBuilderFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::GENERATOR_REQUEST_BUILDER,
            'GenerateGenerator/GenerateGeneratorRequestBuilder.php.twig'
        );
    }

    private function buildGeneratorRequestBuilderImplFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::GENERATOR_REQUEST_BUILDER_IMPL,
            'GenerateGenerator/GenerateGeneratorRequestBuilderImpl.php.twig'
        );
    }

    private function buildGeneratorRequestDTOFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::GENERATOR_REQUEST_DTO,
            'GenerateGenerator/GenerateGeneratorRequestDTO.php.twig'
        );
    }

    private function buildGeneratorTestFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::GENERATOR_TEST,
            'GenerateGenerator/GenerateGeneratorTest.php.twig'
        );
    }

    private function buildSkeletonFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::SKELETON,
            'GenerateGenerator/GenerateGeneratorSkeleton.php.twig'
        );
    }

    private function buildSkeletonModelFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::SKELETON_MODEL,
            'GenerateGenerator/GenerateGeneratorSkeletonModel.php.twig'
        );
    }

    private function buildSkeletonModelAssemblerFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER,
            'GenerateGenerator/GenerateGeneratorSkeletonModelAssembler.php.twig'
        );
    }

    private function buildSkeletonModelAssemblerImplFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER_IMPL,
            'GenerateGenerator/GenerateGeneratorSkeletonModelAssemblerImpl.php.twig'
        );
    }

    private function buildSkeletonModelAssemblerMockFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER_MOCK,
            'GenerateGenerator/GenerateGeneratorSkeletonModelAssemblerMock.php.twig'
        );
    }

    private function buildSkeletonModelBuilderFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::SKELETON_MODEL_BUILDER,
            'GenerateGenerator/GenerateGeneratorSkeletonModelBuilder.php.twig'
        );
    }

    private function buildSkeletonModelBuilderImplFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::SKELETON_MODEL_BUILDER_IMPL,
            'GenerateGenerator/GenerateGeneratorSkeletonModelBuilderImpl.php.twig'
        );
    }

    private function buildSkeletonModelBuilderMockFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::SKELETON_MODEL_BUILDER_MOCK,
            'GenerateGenerator/GenerateGeneratorSkeletonModelBuilderMock.php.twig'
        );
    }

    private function buildSkeletonModelImplFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::SKELETON_MODEL_IMPL,
            'GenerateGenerator/GenerateGeneratorSkeletonModelImpl.php.twig'
        );
    }

    private function buildServiceXmlFileObject(string $domain, string $entity): FileObject
    {
        return $this->buildFileObject(
            $domain,
            $entity,
            GenerateGeneratorFileObjectType::SERVICE_XML,
            'GenerateGenerator/GenerateGeneratorServiceXml.php.twig'
        );
    }

    /**
     * @param FileObject[]
     */
    private function insertFileObjects(array $fileObjects): void
    {
        foreach ($fileObjects as $fileObject) {
            $this->fileObjectGateway->insert($fileObject);
        }
    }

    public function setAssembler(GenerateGeneratorGeneratorSkeletonModelAssembler $assembler): void
    {
        $this->assembler = $assembler;
    }

    public function setFactory(GenerateGeneratorFileObjectFactory $factory): void
    {
        $this->factory = $factory;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway)
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }

    public function setTemplating(TemplatingService $templating): void
    {
        $this->templating = $templating;
    }
}
