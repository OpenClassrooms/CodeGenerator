<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemAssemblerImplSkeletonModelBuilder;

class ViewModelListItemAssemblerImplGenerator extends AbstractViewModelGenerator
{
    private ViewModelListItemAssemblerImplSkeletonModelBuilder $viewModelListItemAssemblerImplSkeletonModelBuilder;

    /**
     * @param ViewModelListItemAssemblerImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelListItemAssemblerImplFileObject = $this->buildViewModelListItemAssemblerImplFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($viewModelListItemAssemblerImplFileObject);

        return $viewModelListItemAssemblerImplFileObject;
    }

    public function buildViewModelListItemAssemblerImplFileObject(string $useCaseResponseClassName)
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseResponseFileObject = $this->createUseCaseResponseObject();
        $viewModelListItemFileObject = $this->createViewModelListItemFileObject();
        $viewModelListItemAssemblerFileObject = $this->createViewModelListItemAssemblerFileObject();
        $viewModelListItemAssemblerImplFileObject = $this->createViewModelListItemAssemblerImplFileObject();
        $viewModelListItemImplFileObject = $this->createViewModelListItemImplFileObject();

        $viewModelAssemblerTrait = $this->createViewModelAssemblerTraitFileObject();

        $viewModelListItemAssemblerImplFileObject->setContent(
            $this->generateContent(
                [
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE  => $useCaseResponseFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM                => $viewModelListItemFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL           => $viewModelListItemImplFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT          => $viewModelAssemblerTrait,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER      => $viewModelListItemAssemblerFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL => $viewModelListItemAssemblerImplFileObject,
                ]
            )
        );

        return $viewModelListItemAssemblerImplFileObject;
    }

    private function createUseCaseResponseObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
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

    private function createViewModelListItemAssemblerFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelListItemAssemblerImplFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelListItemImplFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelAssemblerTraitFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    /**
     * @param FileObject[]
     */
    private function generateContent(array $fileObjects): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    /**
     * @param FileObject[]
     */
    private function createSkeletonModel(array $fileObjects): ViewModelListItemAssemblerImplSkeletonModel
    {
        return $this->viewModelListItemAssemblerImplSkeletonModelBuilder->create()
            ->withUseCaseResponse(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE]
            )
            ->withViewModelListItem($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM])
            ->withViewModelListItemImpl($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL])
            ->withViewModelAssemblerTrait($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT])
            ->withViewModelListItemAssembler($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER])
            ->withViewModelListItemAssemblerImpl(
                $fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL]
            )
            ->build();
    }

    public function setViewModelListItemAssemblerImplSkeletonModelBuilder(
        ViewModelListItemAssemblerImplSkeletonModelBuilder $viewModelListItemAssemblerImplSkeletonModelBuilder
    ): void {
        $this->viewModelListItemAssemblerImplSkeletonModelBuilder = $viewModelListItemAssemblerImplSkeletonModelBuilder;
    }
}
