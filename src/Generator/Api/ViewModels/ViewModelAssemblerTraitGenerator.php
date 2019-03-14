<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelAssemblerTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelAssemblerTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelAssemblerTraitSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

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
        $useCaseResponseDTOFileObject = $this->createUseCaseResponseDTOFileObject($useCaseResponseClassName);
        $useCaseResponseFileObject = $this->createUseCaseResponseObject($useCaseResponseDTOFileObject);
        $viewModelAssemblerTraitFileObject = $this->createViewModelAssemblerTraitObject($useCaseResponseDTOFileObject);

        $viewModelAssemblerTraitFileObject->setFields(
            $this->getPublicClassFields($useCaseResponseDTOFileObject->getClassName())
        );
        $viewModelAssemblerTraitFileObject->setContent(
            $this->generateContent($viewModelAssemblerTraitFileObject, $useCaseResponseFileObject)
        );

        return $viewModelAssemblerTraitFileObject;
    }

    private function createUseCaseResponseDTOFileObject(string $useCaseResponseClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $useCaseResponseClassName
        );

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createUseCaseResponseObject(FileObject $useCaseResponseFileObject): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $useCaseResponseFileObject->getDomain(),
            $useCaseResponseFileObject->getEntity(),
            $useCaseResponseFileObject->getBaseNamespace()
        );
    }

    private function createViewModelAssemblerTraitObject(FileObject $useCaseResponseFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT,
            $useCaseResponseFileObject->getDomain(),
            $useCaseResponseFileObject->getEntity(),
            $useCaseResponseFileObject->getBaseNamespace()
        );
    }

    private function generateContent(
        FileObject $viewModelAssemblerTraitFileObject,
        FileObject $useCaseResponseFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelAssemblerTraitFileObject, $useCaseResponseFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelAssemblerTraitFileObject,
        FileObject $useCaseResponseFileObject
    ): ViewModelAssemblerTraitSkeletonModel
    {
        return $this->viewModelAssemblerTraitSkeletonModelAssembler->create(
            $viewModelAssemblerTraitFileObject,
            $useCaseResponseFileObject
        );
    }

    public function setViewModelAssemblerTraitSkeletonModelAssembler(
        ViewModelAssemblerTraitSkeletonModelAssembler $viewModelAssemblerTraitSkeletonModelAssembler
    ): void
    {
        $this->viewModelAssemblerTraitSkeletonModelAssembler = $viewModelAssemblerTraitSkeletonModelAssembler;
    }
}
