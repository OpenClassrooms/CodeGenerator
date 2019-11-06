<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
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

    private function buildViewModelAssemblerTraitFileObject(string $useCaseResponseClassName): FileObject
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseResponseDTOFileObject = $this->createUseCaseResponseDTOFileObject();
        $useCaseResponseFileObject = $this->createUseCaseResponseObject();
        $viewModelAssemblerTraitFileObject = $this->createViewModelAssemblerTraitObject();

        $viewModelAssemblerTraitFileObject->setFields(
            $this->getPublicClassFields($useCaseResponseDTOFileObject->getClassName())
        );
        $viewModelAssemblerTraitFileObject->setContent(
            $this->generateContent($viewModelAssemblerTraitFileObject, $useCaseResponseFileObject)
        );

        return $viewModelAssemblerTraitFileObject;
    }

    private function createUseCaseResponseDTOFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
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

    private function generateContent(
        FileObject $viewModelAssemblerTraitFileObject,
        FileObject $useCaseResponseFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel($viewModelAssemblerTraitFileObject, $useCaseResponseFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelAssemblerTraitFileObject,
        FileObject $useCaseResponseFileObject
    ): ViewModelAssemblerTraitSkeletonModel {
        return $this->viewModelAssemblerTraitSkeletonModelAssembler->create(
            $viewModelAssemblerTraitFileObject,
            $useCaseResponseFileObject
        );
    }

    public function setViewModelAssemblerTraitSkeletonModelAssembler(
        ViewModelAssemblerTraitSkeletonModelAssembler $viewModelAssemblerTraitSkeletonModelAssembler
    ): void {
        $this->viewModelAssemblerTraitSkeletonModelAssembler = $viewModelAssemblerTraitSkeletonModelAssembler;
    }
}
