<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailAssemblerSkeletonModelAssembler;

final class ViewModelDetailAssemblerGenerator extends AbstractViewModelGenerator
{
    private ViewModelDetailAssemblerSkeletonModelAssembler $viewModelDetailAssemblerSkeletonModelAssembler;

    /**
     * @param ViewModelDetailAssemblerGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailAssemblerFileObject = $this->buildViewModelDetailAssemblerFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($viewModelDetailAssemblerFileObject);

        return $viewModelDetailAssemblerFileObject;
    }

    public function buildViewModelDetailAssemblerFileObject(string $useCaseResponseClassName)
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject();
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject();
        $viewModelDetailFileObject = $this->createViewModelDetailFileObject();
        $viewModelDetailAssemblerFileObject = $this->createViewModelDetailAssemblerFileObject();

        $viewModelDetailAssemblerFileObject->setFields(
            $this->getPublicClassFields($useCaseDetailResponseDTOFileObject->getClassName())
        );

        $viewModelDetailAssemblerFileObject->setContent(
            $this->generateContent(
                $useCaseDetailResponseFileObject,
                $viewModelDetailFileObject,
                $viewModelDetailAssemblerFileObject
            )
        );

        return $viewModelDetailAssemblerFileObject;
    }

    private function createUseCaseDetailResponseDTOFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelDetailFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelDetailAssemblerFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $useCaseDetailResponseFileObject,
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelDetailAssemblerFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseDetailResponseFileObject,
            $viewModelDetailFileObject,
            $viewModelDetailAssemblerFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseDetailResponseFileObject,
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelDetailAssemblerFileObject
    ): ViewModelDetailAssemblerSkeletonModel {
        return $this->viewModelDetailAssemblerSkeletonModelAssembler->create(
            $useCaseDetailResponseFileObject,
            $viewModelDetailFileObject,
            $viewModelDetailAssemblerFileObject
        );
    }

    public function setViewModelDetailAssemblerSkeletonModelAssembler(
        ViewModelDetailAssemblerSkeletonModelAssembler $assembler
    ): void {
        $this->viewModelDetailAssemblerSkeletonModelAssembler = $assembler;
    }
}
