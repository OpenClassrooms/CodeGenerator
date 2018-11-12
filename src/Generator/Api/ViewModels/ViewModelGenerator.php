<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Services\FieldObjectService;
use OpenClassrooms\CodeGenerator\SkeletonModels\ViewModel\ViewModelSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelGenerator implements Generator
{
    /**
     * @var FieldObjectService
     */
    private $fieldObjectService;

    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @var \Twig_Environment
     */
    private $templating;

    /**
     * @var UseCaseResponseFileObjectFactory
     */
    private $useCaseResponseFileObjectFactory;

    /**
     * @var ViewModelFileObjectFactory
     */
    private $viewModelFileObjectFactory;

    /**
     * @var ViewModelSkeletonModelAssembler
     */
    private $viewModelSkeletonModelAssembler;

    /**
     * @param ViewModelGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelFileObject = $this->createViewModelFileObject($generatorRequest->getResponseClassName());
        $viewModelFileObject->setContent($this->generateContent($viewModelFileObject));
        $this->insertFileObject($viewModelFileObject);

        return $viewModelFileObject;
    }

    private function createViewModelFileObject(string $responseClassName): FileObject
    {
        $responseFileObject = $this->createResponseFileObject($responseClassName);

        $viewModel = $this->viewModelFileObjectFactory
            ->create(ViewModelFileObjectType::API_VIEW_MODEL, $responseFileObject->getClassName());
        $viewModel->setFields($this->fieldObjectService->getPublicClassFields($responseFileObject->getClassName()));

        return $viewModel;
    }

    private function createResponseFileObject(string $className): FileObject
    {
        $responseFileObject = $this->useCaseResponseFileObjectFactory
            ->create(UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE, $className);

        return $responseFileObject;
    }

    private function generateContent(FileObject $viewModelFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelFileObject);

        return $this->render('Api/ViewModels/ViewModel.php.twig', ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(FileObject $viewModelFileObject)
    {
        return $this->viewModelSkeletonModelAssembler->create($viewModelFileObject);
    }

    private function render(string $template, array $parameters): string
    {
        return $this->templating->render($template, $parameters);
    }

    private function insertFileObject(FileObject $viewModelFileObject): void
    {
        $this->fileObjectGateway->insert($viewModelFileObject);
    }

    public function setFieldObjectService(FieldObjectService $fieldObjectService): void
    {
        $this->fieldObjectService = $fieldObjectService;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway)
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }

    public function setTemplating(\Twig_Environment $templating): void
    {
        $this->templating = $templating;
    }

    public function setUseCaseResponseFileObjectFactory(
        UseCaseResponseFileObjectFactory $useCaseResponseFileObjectFactory
    )
    {
        $this->useCaseResponseFileObjectFactory = $useCaseResponseFileObjectFactory;
    }

    public function setViewModelFileObjectFactory(ViewModelFileObjectFactory $viewModelFileObjectFactory)
    {
        $this->viewModelFileObjectFactory = $viewModelFileObjectFactory;
    }

    public function setViewModelSkeletonModelAssembler(ViewModelSkeletonModelAssembler $viewModelSkeletonModelAssembler
    ): void
    {
        $this->viewModelSkeletonModelAssembler = $viewModelSkeletonModelAssembler;
    }
}
