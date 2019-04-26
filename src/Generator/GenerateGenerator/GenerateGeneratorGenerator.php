<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Commands\ConstructionPatternType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\GenerateGeneratorFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\GenerateGeneratorFileObjectType;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\GenerateGeneratorGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Services\TemplatingService;
use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\GenerateGeneratorGeneratorSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\GenerateGeneratorGeneratorSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
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

    private function buildSkeletonModel(string $domain, string $entity, string $constructionPattern): GenerateGeneratorGeneratorSkeletonModel
    {
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

        return $fileObjects;
    }

    private function buildGeneratorFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(GenerateGeneratorFileObjectType::GENERATOR, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGenerator.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildGeneratorFileObjectStubFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(GenerateGeneratorFileObjectType::FILE_OBJECT_STUB, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorFileObjectStub.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildGeneratorRequestFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(GenerateGeneratorFileObjectType::GENERATOR_REQUEST, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorRequest.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildGeneratorRequestBuilderFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(
            GenerateGeneratorFileObjectType::GENERATOR_REQUEST_BUILDER,
            $domain,
            $entity
        );

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorRequestBuilder.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildGeneratorRequestBuilderImplFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(
            GenerateGeneratorFileObjectType::GENERATOR_REQUEST_BUILDER_IMPL,
            $domain,
            $entity
        );

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorRequestBuilderImpl.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildGeneratorRequestDTOFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(GenerateGeneratorFileObjectType::GENERATOR_REQUEST_DTO, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorRequestDTO.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildGeneratorTestFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(GenerateGeneratorFileObjectType::GENERATOR_TEST, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorTest.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(GenerateGeneratorFileObjectType::SKELETON, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorSkeleton.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonModelFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(GenerateGeneratorFileObjectType::SKELETON_MODEL, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorSkeletonModel.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonModelAssemblerFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(
            GenerateGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER,
            $domain,
            $entity
        );

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorSkeletonModelAssembler.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonModelAssemblerImplFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(
            GenerateGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER_IMPL,
            $domain,
            $entity
        );

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorSkeletonModelAssemblerImpl.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonModelAssemblerMockFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(
            GenerateGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER_MOCK,
            $domain,
            $entity
        );

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorSkeletonModelAssemblerMock.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonModelBuilderFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(GenerateGeneratorFileObjectType::SKELETON_MODEL_BUILDER, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorSkeletonModelBuilder.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonModelBuilderImplFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(
            GenerateGeneratorFileObjectType::SKELETON_MODEL_BUILDER_IMPL,
            $domain,
            $entity
        );

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorSkeletonModelBuilderImpl.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonModelBuilderMockFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(
            GenerateGeneratorFileObjectType::SKELETON_MODEL_BUILDER_MOCK,
            $domain,
            $entity
        );

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorSkeletonModelBuilderMock.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonModelImplFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(GenerateGeneratorFileObjectType::SKELETON_MODEL_IMPL, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'GenerateGenerator/GenerateGeneratorSkeletonModelImpl.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
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
