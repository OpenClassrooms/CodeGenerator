<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModelsDetail;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetail\ViewModelDetailSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetail\ViewModelDetailSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelDetailSkeletonModelAssembler
     */
    private $viewModelDetailSkeletonModelAssembler;

    private function createResponseFileObject(string $responseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($responseClassName);
        $responseFileObject = $this->useCaseResponseFileObjectFactory
            ->create(UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE, $domain, $entity);

        return $responseFileObject;
    }

    private function createSkeletonModel(FileObject $viewModelDetailFileObject): ViewModelDetailSkeletonModel
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

    public function setViewModelDetailSkeletonModelAssembler(
        ViewModelDetailSkeletonModelAssembler $viewModelDetailSkeletonModelAssembler
    ): void
    {
        $this->viewModelDetailSkeletonModelAssembler = $viewModelDetailSkeletonModelAssembler;
    }
}
