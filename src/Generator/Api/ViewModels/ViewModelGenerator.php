<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelSkeletonModelAssembler
     */
    private $viewModelSkeletonModelAssembler;

    /**
     * @param ViewModelGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelFileObject = $this->buildViewModelFileObject($generatorRequest->getResponseClassName());
        $viewModelFileObject->setContent($this->generateContent($viewModelFileObject));
        $this->insertFileObject($viewModelFileObject);

        return $viewModelFileObject;
    }

    private function buildViewModelFileObject(string $useCaseResponseClassName): FileObject
    {
        $useCaseResponseFileObject = $this->buildUseCaseResponseFileObject($useCaseResponseClassName);

        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($useCaseResponseClassName);
        $viewModel = $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL, $domain, $entity);
        $viewModel->setFields($this->getPublicClassFields($useCaseResponseFileObject->getClassName()));

        return $viewModel;
    }

    private function buildUseCaseResponseFileObject(string $useCaseResponseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($useCaseResponseClassName);
        $responseFileObject = $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $domain,
            $entity
        );

        return $responseFileObject;
    }

    private function generateContent(FileObject $viewModelFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(FileObject $viewModelFileObject): ViewModelSkeletonModel
    {
        return $this->viewModelSkeletonModelAssembler->create($viewModelFileObject);
    }

    public function setViewModelSkeletonModelAssembler(
        ViewModelSkeletonModelAssembler $viewModelSkeletonModelAssembler
    ): void
    {
        $this->viewModelSkeletonModelAssembler = $viewModelSkeletonModelAssembler;
    }
}
