<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelAssemblerTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelAssemblerTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelAssemblerTraitSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelAssemblerTraitGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelAssemblerTraitSkeletonModelAssembler
     */
    private $viewModelAssemblerTraitSkeletonModelAssembler;

    /**
     * @param ViewModelAssemblerTraitGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelAssemblerTraitFileObject = $this->buildViewModelAssemblerTraitFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );
        $this->insertFileObject($viewModelAssemblerTraitFileObject);

        return $viewModelAssemblerTraitFileObject;
    }

    public function setViewModelAssemblerTraitSkeletonModelAssembler(
        ViewModelAssemblerTraitSkeletonModelAssembler $viewModelAssemblerTraitSkeletonModelAssembler
    ): void {
        $this->viewModelAssemblerTraitSkeletonModelAssembler = $viewModelAssemblerTraitSkeletonModelAssembler;
    }

    private function buildViewModelAssemblerTraitFileObject(string $useCaseResponseClassName): FileObject
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseResponseCommonFieldTraitFileObject = $this->createUseCaseResponseCommonFieldTraitFileObject();
        $useCaseResponseFileObject = $this->createUseCaseResponseObject();
        $viewModelAssemblerTraitFileObject = $this->createViewModelAssemblerTraitObject();
        $viewModelFileObject = $this->createViewModelObject();

        $viewModelAssemblerTraitFileObject->setFields(
            $this->getPublicClassFields($useCaseResponseCommonFieldTraitFileObject->getClassName())
        );
        $viewModelAssemblerTraitFileObject->setContent(
            $this->generateContent($viewModelAssemblerTraitFileObject, $useCaseResponseFileObject, $viewModelFileObject)
        );

        return $viewModelAssemblerTraitFileObject;
    }

    private function createSkeletonModel(
        FileObject $viewModelAssemblerTraitFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $viewModelFileObject
    ): ViewModelAssemblerTraitSkeletonModel {
        return $this->viewModelAssemblerTraitSkeletonModelAssembler->create(
            $viewModelAssemblerTraitFileObject,
            $useCaseResponseFileObject,
            $viewModelFileObject
        );
    }

    private function createUseCaseResponseCommonFieldTraitFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_COMMON_FIELD_TRAIT,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
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

    private function createViewModelAssemblerTraitObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $viewModelAssemblerTraitFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $viewModelFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $viewModelAssemblerTraitFileObject,
            $useCaseResponseFileObject,
            $viewModelFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }
}
