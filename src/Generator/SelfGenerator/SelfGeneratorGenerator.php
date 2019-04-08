<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\SelfGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\SelfGeneratorFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\SelfGeneratorFileObjectType;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\Request\SelfGeneratorGeneratorRequest;
use OpenClassrooms\CodeGenerator\Services\TemplatingService;
use OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\SelfGeneratorGeneratorSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\SelfGeneratorGeneratorSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class SelfGeneratorGenerator
{
    /**
     * @var SelfGeneratorGeneratorSkeletonModelAssembler
     */
    private $assembler;

    /**
     * @var SelfGeneratorFileObjectFactory
     */
    private $factory;

    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @var SelfGeneratorGeneratorSkeletonModel
     */
    private $skeletonModel;

    /**
     * @var TemplatingService
     */
    private $templating;

    /**
     * @param SelfGeneratorGeneratorRequest $generatorRequest
     *
     * @return FileObject
     */
    public function generate(GeneratorRequest $generatorRequest): array
    {
        $this->buildSkeletonModel($generatorRequest->getDomain(), $generatorRequest->getEntity());
        $fileObjects = $this->buildFileObjects($generatorRequest->getDomain(), $generatorRequest->getEntity());

        $this->insertFileObjects($fileObjects);

        return $fileObjects;
    }

    private function buildSkeletonModel(string $domain, string $entity): SelfGeneratorGeneratorSkeletonModel
    {
        return $this->skeletonModel = $this->assembler->create($domain, $entity);
    }

    /**
     * @return FileObject[]
     */
    private function buildFileObjects(string $domain, string $entity): array
    {
        $fileObjects = [];
        $fileObjects[] = $this->buildGeneratorFileObject($domain, $entity);
        $fileObjects[] = $this->buildGeneratorFileObjectStubFileObject($domain, $entity);
        $fileObjects[] = $this->buildGeneratorRequestFileObject($domain, $entity);
        $fileObjects[] = $this->buildGeneratorRequestBuilderFileObject($domain, $entity);
        $fileObjects[] = $this->buildGeneratorRequestBuilderImplFileObject($domain, $entity);
        $fileObjects[] = $this->buildGeneratorRequestDtoFileObject($domain, $entity);
        $fileObjects[] = $this->buildGeneratorTestFileObject($domain, $entity);
        $fileObjects[] = $this->buildSkeletonFileObject($domain, $entity);
        $fileObjects[] = $this->buildSkeletonModelFileObject($domain, $entity);
        $fileObjects[] = $this->buildSkeletonModelAssemblerFileObject($domain, $entity);
        $fileObjects[] = $this->buildSkeletonModelAssemblerImplFileObject($domain, $entity);
        $fileObjects[] = $this->buildSkeletonModelBuilderFileObject($domain, $entity);
        $fileObjects[] = $this->buildSkeletonModelBuilderImplFileObject($domain, $entity);
        $fileObjects[] = $this->buildSkeletonModelImplFileObject($domain, $entity);

        return $fileObjects;
    }

    private function buildGeneratorFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(SelfGeneratorFileObjectType::GENERATOR, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'SelfGenerator/SelfGenerator.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildGeneratorFileObjectStubFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(SelfGeneratorFileObjectType::FILE_OBJECT_STUB, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'SelfGenerator/SelfGeneratorFileObjectStub.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildGeneratorRequestFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(SelfGeneratorFileObjectType::GENERATOR_REQUEST, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'SelfGenerator/SelfGeneratorRequest.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildGeneratorRequestBuilderFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(SelfGeneratorFileObjectType::GENERATOR_REQUEST_BUILDER, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'SelfGenerator/SelfGeneratorRequestBuilder.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildGeneratorRequestBuilderImplFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(
            SelfGeneratorFileObjectType::GENERATOR_REQUEST_BUILDER_IMPL,
            $domain,
            $entity
        );

        $fileObject->setContent(
            $this->templating->render(
                'SelfGenerator/SelfGeneratorRequestBuilderImpl.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildGeneratorRequestDtoFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(SelfGeneratorFileObjectType::GENERATOR_REQUEST_DTO, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'SelfGenerator/SelfGeneratorRequestDto.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildGeneratorTestFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(SelfGeneratorFileObjectType::GENERATOR_TEST, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'SelfGenerator/SelfGeneratorTest.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(SelfGeneratorFileObjectType::SKELETON, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render('SelfGenerator/SelfGeneratorSkeleton.php.twig', [])
        );

        return $fileObject;
    }

    private function buildSkeletonModelFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(SelfGeneratorFileObjectType::SKELETON_MODEL, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'SelfGenerator/SelfGeneratorSkeletonModel.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonModelAssemblerFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(SelfGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'SelfGenerator/SelfGeneratorSkeletonModelAssembler.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonModelAssemblerImplFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(
            SelfGeneratorFileObjectType::SKELETON_MODEL_ASSEMBLER_IMPL,
            $domain,
            $entity
        );

        $fileObject->setContent(
            $this->templating->render(
                'SelfGenerator/SelfGeneratorSkeletonModelAssemblerImpl.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonModelBuilderFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(SelfGeneratorFileObjectType::SKELETON_MODEL_BUILDER, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'SelfGenerator/SelfGeneratorSkeletonModelBuilder.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonModelBuilderImplFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(
            SelfGeneratorFileObjectType::SKELETON_MODEL_BUILDER_IMPL,
            $domain,
            $entity
        );

        $fileObject->setContent(
            $this->templating->render(
                'SelfGenerator/SelfGeneratorSkeletonModelBuilderImpl.php.twig',
                ['skeletonModel' => $this->skeletonModel]
            )
        );

        return $fileObject;
    }

    private function buildSkeletonModelImplFileObject(string $domain, string $entity): FileObject
    {
        $fileObject = $this->factory->create(SelfGeneratorFileObjectType::SKELETON_MODEL_IMPL, $domain, $entity);

        $fileObject->setContent(
            $this->templating->render(
                'SelfGenerator/SelfGeneratorSkeletonModelImpl.php.twig',
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

    public function setAssembler(SelfGeneratorGeneratorSkeletonModelAssembler $assembler): void
    {
        $this->assembler = $assembler;
    }

    public function setFactory(SelfGeneratorFileObjectFactory $factory): void
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
