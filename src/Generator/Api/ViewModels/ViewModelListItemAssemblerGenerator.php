<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemAssemblerSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
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
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject($useCaseResponseClassName);
        $viewModelListItemFileObject = $this->createViewModelListItemFileObject($useCaseListItemResponseFileObject);
        $viewModelListItemAssemblerFileObject = $this->createViewModelListItemAssemblerFileObject(
            $useCaseListItemResponseFileObject
        );

        $viewModelListItemAssemblerFileObject->setContent(
            $this->generateContent(
                $useCaseListItemResponseFileObject,
                $viewModelListItemFileObject,
                $viewModelListItemAssemblerFileObject
            )
        );

        return $viewModelListItemAssemblerFileObject;
    }

    private function createUseCaseListItemResponseFileObject(string $useCaseResponseClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createViewModelListItemFileObject(FileObject $useCaseListItemResponseFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity(),
            $useCaseListItemResponseFileObject->getBaseNamespace()
        );
    }

    private function createViewModelListItemAssemblerFileObject(FileObject $useCaseListItemResponseFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity(),
            $useCaseListItemResponseFileObject->getBaseNamespace()
        );
    }

    private function generateContent(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelListItemAssemblerFileObject
    ): string
    {
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
    ): ViewModelListItemAssemblerSkeletonModel
    {
        return $this->viewModelListItemAssemblerSkeletonModelAssembler->create(
            $useCaseListItemResponseFileObject,
            $viewModelListItemFileObject,
            $viewModelListItemAssemblerFileObject
        );
    }

    public function setViewModelListItemAssemblerSkeletonModelAssembler(
        ViewModelListItemAssemblerSkeletonModelAssembler $viewModelListItemAssemblerSkeletonModelAssembler
    ): void
    {
        $this->viewModelListItemAssemblerSkeletonModelAssembler = $viewModelListItemAssemblerSkeletonModelAssembler;
    }
}
