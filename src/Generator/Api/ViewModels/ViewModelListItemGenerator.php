<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemSkeletonModelAssembler;

class ViewModelListItemGenerator extends AbstractViewModelGenerator
{
    private ViewModelListItemSkeletonModelAssembler $viewModelListItemSkeletonModelAssembler;

    /**
     * @param ViewModelListItemGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelListItemFileObject = $this->buildViewModelListItemFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );
        $this->insertFileObject($viewModelListItemFileObject);

        return $viewModelListItemFileObject;
    }

    private function buildViewModelListItemFileObject(string $useCaseResponseClassName): FileObject
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject();

        $viewModelListItemFileObject = $this->createViewModelListItemFileObject();
        $viewModelFileObject = $this->createViewModel($useCaseDetailResponseFileObject);

        $viewModelListItemFileObject->setContent(
            $this->generateContent($viewModelListItemFileObject, $viewModelFileObject)
        );

        return $viewModelListItemFileObject;
    }

    private function createUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelListItemFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModel(FileObject $useCaseDetailResponseFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(FileObject $viewModelListItemFileObject, FileObject $viewModelFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelListItemFileObject, $viewModelFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelFileObject
    ): ViewModelListItemSkeletonModel {
        return $this->viewModelListItemSkeletonModelAssembler->create(
            $viewModelListItemFileObject,
            $viewModelFileObject
        );
    }

    public function setViewModelListItemSkeletonModelAssembler(
        ViewModelListItemSkeletonModelAssembler $viewModelListItemSkeletonModelAssembler
    ): void {
        $this->viewModelListItemSkeletonModelAssembler = $viewModelListItemSkeletonModelAssembler;
    }
}
