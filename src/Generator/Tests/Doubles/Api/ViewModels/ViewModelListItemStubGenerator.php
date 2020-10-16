<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\StubFieldObjectTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelListItemStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelListItemStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\StubFieldUtility;

class ViewModelListItemStubGenerator extends AbstractViewModelGenerator
{
    use StubFieldObjectTrait;

    private const LIST_ITEM_RESPONSE = 'ListItemResponse';

    private ViewModelListItemStubSkeletonModelAssembler $viewModelStubListItemSkeletonModelAssembler;

    /**
     * @param ViewModelListItemStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelListItemStubFileObject = $this->buildViewModelListItemStubFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($viewModelListItemStubFileObject);

        return $viewModelListItemStubFileObject;
    }

    private function buildViewModelListItemStubFileObject(
        string $useCaseResponseClassName
    ): FileObject {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseListItemResponseDTOFileObject = $this->createUseCaseListItemResponseDTOFileObject();
        $useCaseListItemResponseStubFileObject = $this->createUseCaseListItemResponseStubFileObject();
        $viewModelListItemFileObject = $this->createViewModelListItemFileObject();
        $viewModelListItemStubFileObject = $this->createViewModelListItemStubFileObject();

        $viewModelListItemStubFileObject->setFields($this->generateFields($useCaseListItemResponseDTOFileObject));
        $viewModelListItemStubFileObject->setConsts(
            $this->generateConsts($viewModelListItemStubFileObject)
        );
        $viewModelListItemStubFileObject->setContent(
            $this->generateContent(
                $viewModelListItemStubFileObject,
                $viewModelListItemFileObject,
                $useCaseListItemResponseStubFileObject
            )
        );

        return $viewModelListItemStubFileObject;
    }

    private function createUseCaseListItemResponseDTOFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseListItemResponseStubFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
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

    private function createViewModelListItemStubFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateFields(FileObject $viewModelListItemImplFileObject): array
    {
        $viewModelListItemFields = $this->getPublicTraitAndClassFields(
            $viewModelListItemImplFileObject->getClassName()
        );

        $stubFieldObjects = StubFieldUtility::generateStubFieldObjects($viewModelListItemFields);

        return $this->buildStubFieldObjects($viewModelListItemImplFileObject, $stubFieldObjects);
    }

    private function generateConsts(FileObject $viewModelListItemStubFileObject): array
    {
        return ConstUtility::generateConstsFromStubFileObject(
            $viewModelListItemStubFileObject,
            self::LIST_ITEM_RESPONSE
        );
    }

    private function generateContent(
        FileObject $viewModelListItemStubFileObject,
        FileObject $viewModelListItemFileObject,
        FileObject $useCaseListItemResponseStubFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $viewModelListItemStubFileObject,
            $viewModelListItemFileObject,
            $useCaseListItemResponseStubFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelListItemStubFileObject,
        FileObject $viewModelListItemFileObject,
        FileObject $useCaseListItemResponseStubFileObject
    ): ViewModelListItemStubSkeletonModel {
        return $this->viewModelStubListItemSkeletonModelAssembler->create(
            $viewModelListItemStubFileObject,
            $viewModelListItemFileObject,
            $useCaseListItemResponseStubFileObject
        );
    }

    public function setViewModelStubListItemSkeletonModelAssembler(
        ViewModelListItemStubSkeletonModelAssembler $assembler
    ): void {
        $this->viewModelStubListItemSkeletonModelAssembler = $assembler;
    }
}
