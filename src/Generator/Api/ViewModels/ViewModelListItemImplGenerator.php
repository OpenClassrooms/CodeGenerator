<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemImplSkeletonModelAssembler;

class ViewModelListItemImplGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelListItemImplSkeletonModelAssembler
     */
    private $viewModelListItemImplSkeletonModelAssembler;

    /**
     * @param ViewModelListItemImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelListItemImplFileObject = $this->buildViewModelListItemImplFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );
        $this->insertFileObject($viewModelListItemImplFileObject);

        return $viewModelListItemImplFileObject;
    }

    private function buildViewModelListItemImplFileObject(string $useCaseResponseClassName): FileObject
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $viewModelListItemFileObject = $this->createViewModelListItemFileObject();
        $viewModelListItemImplFileObject = $this->createViewModelListItemImplObject();

        $viewModelListItemImplFileObject->setContent(
            $this->generateContent($viewModelListItemFileObject, $viewModelListItemImplFileObject)
        );

        return $viewModelListItemImplFileObject;
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

    private function createViewModelListItemImplObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelListItemImplFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel($viewModelListItemFileObject, $viewModelListItemImplFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelListItemImplFileObject
    ): ViewModelListItemImplSkeletonModel {
        return $this->viewModelListItemImplSkeletonModelAssembler->create(
            $viewModelListItemFileObject,
            $viewModelListItemImplFileObject
        );
    }

    public function setViewModelListItemImplSkeletonModelAssembler(
        ViewModelListItemImplSkeletonModelAssembler $viewModelListItemImplSkeletonModelAssembler
    ): void {
        $this->viewModelListItemImplSkeletonModelAssembler = $viewModelListItemImplSkeletonModelAssembler;
    }
}
