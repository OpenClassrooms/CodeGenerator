<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemAssemblerSkeletonModelAssembler;

class ViewModelListItemAssemblerGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelListItemAssemblerSkeletonModelAssembler
     */
    private $viewModelListItemAssemblerSkeletonModelAssembler;

    /**
     * @param ViewModelListItemAssemblerGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelListItemAssemblerFileObject = $this->buildViewModelListItemAssemblerFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($viewModelListItemAssemblerFileObject);

        return $viewModelListItemAssemblerFileObject;
    }

    public function buildViewModelListItemAssemblerFileObject(string $useCaseResponseClassName)
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject();
        $viewModelListItemFileObject = $this->createViewModelListItemFileObject();
        $viewModelListItemAssemblerFileObject = $this->createViewModelListItemAssemblerFileObject();

        $viewModelListItemAssemblerFileObject->setContent(
            $this->generateContent(
                $useCaseListItemResponseFileObject,
                $viewModelListItemFileObject,
                $viewModelListItemAssemblerFileObject
            )
        );

        return $viewModelListItemAssemblerFileObject;
    }

    private function createUseCaseListItemResponseFileObject(): FileObject
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

    private function createViewModelListItemAssemblerFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelListItemAssemblerFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseListItemResponseFileObject,
            $viewModelListItemFileObject,
            $viewModelListItemAssemblerFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelListItemAssemblerFileObject
    ): ViewModelListItemAssemblerSkeletonModel {
        return $this->viewModelListItemAssemblerSkeletonModelAssembler->create(
            $useCaseListItemResponseFileObject,
            $viewModelListItemFileObject,
            $viewModelListItemAssemblerFileObject
        );
    }

    public function setViewModelListItemAssemblerSkeletonModelAssembler(
        ViewModelListItemAssemblerSkeletonModelAssembler $viewModelListItemAssemblerSkeletonModelAssembler
    ): void {
        $this->viewModelListItemAssemblerSkeletonModelAssembler = $viewModelListItemAssemblerSkeletonModelAssembler;
    }
}
