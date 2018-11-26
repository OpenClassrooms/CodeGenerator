<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\FileObjects\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\EntityStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Services\StubService;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Entities\EntityStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Entities\EntityStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EntityStubGenerator extends AbstractViewModelGenerator
{
    /**
     * @var EntityFileObjectFactory
     */
    private $entityFileObjectFactory;

    /**
     * @var EntityStubSkeletonModelAssembler
     */
    private $entityStubSkeletonModelAssembler;

    /**
     * @var StubService
     */
    private $stubService;

    /**
     * @param EntityStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $entityStubFileObject = $this->buildEntityStubFileObject($generatorRequest->getClassName());
        $viewModelImplFileObject = $this->buildViewModelImplFileObject($generatorRequest->getClassName());
        $entityStubFileObject->setContent(
            $this->generateContent($entityStubFileObject, $viewModelImplFileObject)
        );
        $this->insertFileObject($entityStubFileObject);

        return $entityStubFileObject;
    }

    private function buildEntityStubFileObject(string $viewModelClassName): FileObject
    {
        $viewModelFileObject = $this->buildViewModelFileObject($viewModelClassName);

        $entityStub = $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $viewModelFileObject->getDomain(),
            $viewModelFileObject->getEntity()
        );
        $entityStub->setFields($this->generateStubFields($viewModelFileObject));

        return $entityStub;
    }

    private function buildViewModelFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL, $domain, $entity);
    }

    private function generateStubFields(FileObject $viewModelFileObject): array
    {
        $viewModelFields = $this->getPublicClassFields($viewModelFileObject->getClassName());

        return $this->stubService->setFakeValuesToFields($viewModelFields, $viewModelFileObject);
    }

    private function buildViewModelImplFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_IMPL, $domain, $entity);
    }

    private function generateContent(FileObject $entityStubFileObject, FileObject $viewModelImplFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($entityStubFileObject, $viewModelImplFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityStubFileObject,
        FileObject $viewModelImplFileObject
    ): EntityStubSkeletonModel
    {
        return $this->entityStubSkeletonModelAssembler->create(
            $entityStubFileObject,
            $viewModelImplFileObject
        );
    }

    public function setStubService(StubService $stubService): void
    {
        $this->stubService = $stubService;
    }

    public function setEntityStubSkeletonModelAssembler(
        EntityStubSkeletonModelAssembler $entityStubSkeletonModelAssembler
    ): void
    {
        $this->entityStubSkeletonModelAssembler = $entityStubSkeletonModelAssembler;
    }

    public function setEntityFileObjectFactory(EntityFileObjectFactory $entityFileObjectFactory): void
    {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
    }
}
