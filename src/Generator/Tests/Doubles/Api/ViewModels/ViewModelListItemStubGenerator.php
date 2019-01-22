<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelListItemStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelListItemStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemStubGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelListItemStubSkeletonModelAssembler
     */
    private $viewModelStubListItemSkeletonModelAssembler;

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
    ): FileObject
    {
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject($useCaseResponseClassName);
        $useCaseListItemResponseStubFileObject = $this->createUseCaseListItemResponseStubFileObject(
            $useCaseListItemResponseFileObject
        );
        $viewModelListItemImplFileObject = $this->createViewModelListItemImplFileObject(
            $useCaseListItemResponseFileObject
        );
        $viewModelListItemStubFileObject = $this->createViewModelListItemStubFileObject($useCaseListItemResponseFileObject);

        $viewModelListItemStubFileObject->setConsts($this->generateConsts($useCaseListItemResponseStubFileObject));
        $viewModelListItemStubFileObject->setFields($this->generateFields($useCaseListItemResponseFileObject));
        $viewModelListItemStubFileObject->setContent(
            $this->generateContent(
                $viewModelListItemStubFileObject,
                $viewModelListItemImplFileObject,
                $useCaseListItemResponseStubFileObject
            )
        );

        return $viewModelListItemStubFileObject;
    }

    private function createUseCaseListItemResponseFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $domain,
            $entity
        );
    }

    private function createUseCaseListItemResponseStubFileObject(FileObject $useCaseListItemResponseFileObject): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
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

    /**
     * @param $useCaseListItemResponseFileObject
     *
     * @return FileObject
     */
    private function createViewModelListItemStubFileObject(FileObject $useCaseListItemResponseFileObject): FileObject
    {
        $viewModelListItemStubFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity()
        );

        return $viewModelListItemStubFileObject;
    }

    private function generateConsts(FileObject $useCaseDetailResponseStubFileObject): array
    {
        $useCaseDetailResponseStubFileObject->setConsts(
            $this->getClassConstants($useCaseDetailResponseStubFileObject->getClassName())
        );

        return ConstUtility::generateConstsFromStubReference($useCaseDetailResponseStubFileObject);
    }

    private function generateFields(FileObject $viewModelListItemImplFileObject): array
    {
        $viewModelListItemFields = $this->getParentAndChildPublicClassFields(
            $viewModelListItemImplFileObject->getClassName()
        );

        return FieldUtility::generateStubFieldObjects($viewModelListItemFields, $viewModelListItemImplFileObject);
    }

    private function generateContent(
        FileObject $viewModelListItemStubFileObject,
        FileObject $viewModelListItemImplFileObject,
        FileObject $useCaseListItemResponseStubFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $viewModelListItemStubFileObject,
            $viewModelListItemImplFileObject,
            $useCaseListItemResponseStubFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelListItemStubFileObject,
        FileObject $viewModelListItemImplFileObject,
        FileObject $useCaseListItemResponseStubFileObject
    ): ViewModelListItemStubSkeletonModel
    {
        return $this->viewModelStubListItemSkeletonModelAssembler->create(
            $viewModelListItemStubFileObject,
            $viewModelListItemImplFileObject,
            $useCaseListItemResponseStubFileObject
        );
    }

    public function setViewModelStubListItemSkeletonModelAssembler(
        ViewModelListItemStubSkeletonModelAssembler $viewModelStubListItemSkeletonModelAssembler
    ): void
    {
        $this->viewModelStubListItemSkeletonModelAssembler = $viewModelStubListItemSkeletonModelAssembler;
    }
}
