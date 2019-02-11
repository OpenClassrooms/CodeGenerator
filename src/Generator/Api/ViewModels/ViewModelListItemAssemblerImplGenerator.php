<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemAssemblerImplSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemAssemblerImplGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelListItemAssemblerImplSkeletonModelBuilder
     */
    private $viewModelListItemAssemblerImplSkeletonModelBuilder;

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
        $useCaseListItemResponseDTOFileObject = $this->createUseCaseListItemResponseDTOFileObject(
            $useCaseResponseClassName
        );
        $useCaseResponseFileObject = $this->createUseCaseResponseObject(
            $useCaseListItemResponseDTOFileObject
        );
        $viewModelListItemFileObject = $this->createViewModelListItemFileObject($useCaseListItemResponseDTOFileObject);
        $viewModelListItemAssemblerFileObject = $this->createViewModelListItemAssemblerFileObject(
            $useCaseListItemResponseDTOFileObject
        );
        $viewModelListItemAssemblerImplFileObject = $this->createViewModelListItemAssemblerImplFileObject(
            $useCaseListItemResponseDTOFileObject
        );
        $viewModelListItemImplFileObject = $this->createViewModelListItemImplFileObject(
            $useCaseListItemResponseDTOFileObject
        );

        $viewModelAssemblerTrait = $this->createViewModelAssemblerTraitFileObject($useCaseListItemResponseDTOFileObject);

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

    private function createUseCaseListItemResponseDTOFileObject(string $useCaseResponseClassName): FileObject
    {
        [$domain, $entity] = FileObjectUtility::getDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $domain,
            $entity
        );
    }

    private function createUseCaseResponseObject(FileObject $useCaseListItemResponseFileObject): FileObject
    {

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity()
        );
    }

    private function createViewModelListItemFileObject(FileObject $useCaseListItemResponseFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity()
        );
    }

    private function createViewModelListItemAssemblerFileObject(
        FileObject $useCaseListItemResponseFileObject
    ): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity()
        );
    }

    private function createViewModelListItemAssemblerImplFileObject(
        FileObject $useCaseListItemResponseFileObject
    ): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity()
        );
    }

    private function createViewModelListItemImplFileObject(
        FileObject $useCaseListItemResponseFileObject
    ): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity()
        );
    }

    private function createViewModelAssemblerTraitFileObject(FileObject $useCaseListItemResponseFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity()
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
    ): void
    {
        $this->viewModelListItemAssemblerImplSkeletonModelBuilder = $viewModelListItemAssemblerImplSkeletonModelBuilder;
    }
}
