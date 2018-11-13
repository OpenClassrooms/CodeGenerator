<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModelsDetail;

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
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetail\ViewModelDetailSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailGenerator implements Generator
{
    use ClassNameUtility;

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
    private $viewModelDetailFileObjectFactory;

    /**
     * @var ViewModelDetailSkeletonModelAssembler
     */
    private $viewModelDetailSkeletonModelAssembler;

    /**
     * @var ViewModelFileObjectFactory
     */
    private $viewModelFileObjectFactory;

    private function createResponseFileObject(string $responseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($responseClassName);
        $responseFileObject = $this->useCaseResponseFileObjectFactory
            ->create(UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE, $domain, $entity);

        return $responseFileObject;
    }

    private function createSkeletonModel(FileObject $viewModelDetailFileObject)
    {
        return $this->viewModelDetailSkeletonModelAssembler->create($viewModelDetailFileObject);
    }

    private function createViewModelDetailFileObject(string $responseClassName): FileObject
    {
        $responseFileObject = $this->createResponseFileObject($responseClassName);

        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($responseClassName);
        $viewModel = $this->viewModelFileObjectFactory
            ->create(ViewModelFileObjectType::API_VIEW_MODEL_DETAIL, $domain, $entity);
        $viewModel->setFields($this->fieldObjectService->getPublicClassFields($responseFileObject->getClassName()));

        return $viewModel;
    }

    /**
     * @param ViewModelGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailFileObject = $this->createViewModelDetailFileObject($generatorRequest->getResponseClassName());
        $viewModelDetailFileObject->setContent($this->generateContent($viewModelDetailFileObject));
        $this->insertFileObject($viewModelDetailFileObject);

        return $viewModelDetailFileObject;
    }

    private function generateContent(FileObject $viewModelDetailFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelDetailFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function insertFileObject(FileObject $viewModelDetailFileObject): void
    {
        $this->fileObjectGateway->insert($viewModelDetailFileObject);
    }

    private function render(string $template, array $parameters): string
    {
        return $this->templating->render($template, $parameters);
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

    public function setViewModelDetailSkeletonModelAssembler(
        ViewModelDetailSkeletonModelAssembler $viewModelDetailSkeletonModelAssembler
    ): void
    {
        $this->viewModelDetailSkeletonModelAssembler = $viewModelDetailSkeletonModelAssembler;
    }

    public function setViewModelFileObjectFactory(ViewModelFileObjectFactory $viewModelDetailFileObjectFactory)
    {
        $this->viewModelFileObjectFactory = $viewModelDetailFileObjectFactory;
    }
}
