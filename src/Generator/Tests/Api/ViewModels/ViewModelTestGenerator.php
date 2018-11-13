<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\ViewModelTest\ViewModelTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\ViewModelTest\ViewModelTestSkeletonModelAssembler;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelTestGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelTestSkeletonModelAssembler
     */
    private $viewModelTestSkeletonModelAssembler;

    private function createResponseFileObject(string $responseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($responseClassName);
        $responseFileObject = $this->useCaseResponseFileObjectFactory
            ->create(UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE, $domain, $entity);

        return $responseFileObject;
    }

    private function createSkeletonModel(FileObject $viewModelFileObject): ViewModelTestSkeletonModel
    {
        return $this->viewModelTestSkeletonModelAssembler->create($viewModelFileObject);
    }

    private function createViewModelFileObject(string $responseClassName): FileObject
    {
        $responseFileObject = $this->createResponseFileObject($responseClassName);

        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($responseClassName);
        $viewModel = $this->viewModelFileObjectFactory
            ->create(ViewModelFileObjectType::API_VIEW_MODEL, $domain, $entity);
        $viewModel->setFields($this->fieldObjectService->getPublicClassFields($responseFileObject->getClassName()));

        return $viewModel;
    }

    /**
     * @param ViewModelTestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelFileObject = $this->createViewModelFileObject($generatorRequest->getResponseClassName());
        $viewModelFileObject->setContent($this->generateContent($viewModelFileObject));
        $this->insertFileObject($viewModelFileObject);

        return $viewModelFileObject;
    }

    private function generateContent(FileObject $viewModelFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function insertFileObject(FileObject $viewModelFileObject): void
    {
        $this->fileObjectGateway->insert($viewModelFileObject);
    }

    public function setViewModelSkeletonModelAssembler(
        ViewModelTestSkeletonModelAssembler $viewModelSkeletonModelAssembler
    ): void
    {
        $this->viewModelTestSkeletonModelAssembler = $viewModelSkeletonModelAssembler;
    }

    public function setViewModelTestSkeletonModelAssembler(
        ViewModelTestSkeletonModelAssembler $viewModelTestSkeletonModelAssembler
    )
    {
        $this->viewModelTestSkeletonModelAssembler = $viewModelTestSkeletonModelAssembler;
    }
}
