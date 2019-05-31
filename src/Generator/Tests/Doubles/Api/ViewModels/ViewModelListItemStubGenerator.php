<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelListItemStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelListItemStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\StubFieldUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemStubGenerator extends AbstractViewModelGenerator
{
    const LIST_ITEM_RESPONSE = 'ListItemResponse';

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
        $useCaseListItemResponseDTOFileObject = $this->createUseCaseListItemResponseDTOFileObject(
            $useCaseResponseClassName
        );
        $useCaseListItemResponseStubFileObject = $this->createUseCaseListItemResponseStubFileObject(
            $useCaseListItemResponseDTOFileObject
        );
        $viewModelListItemImplFileObject = $this->createViewModelListItemImplFileObject(
            $useCaseListItemResponseDTOFileObject
        );
        $viewModelListItemStubFileObject = $this->createViewModelListItemStubFileObject(
            $useCaseListItemResponseDTOFileObject
        );

        $viewModelListItemStubFileObject->setFields($this->generateFields($useCaseListItemResponseDTOFileObject));
        $viewModelListItemStubFileObject->setConsts(
            $this->generateConsts($viewModelListItemStubFileObject)
        );
        $viewModelListItemStubFileObject->setContent(
            $this->generateContent(
                $viewModelListItemStubFileObject,
                $viewModelListItemImplFileObject,
                $useCaseListItemResponseStubFileObject
            )
        );

        return $viewModelListItemStubFileObject;
    }

    private function createUseCaseListItemResponseDTOFileObject(string $viewModelClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createUseCaseListItemResponseStubFileObject(
        FileObject $useCaseListItemResponseDTOFileObject
    ): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
            $useCaseListItemResponseDTOFileObject->getDomain(),
            $useCaseListItemResponseDTOFileObject->getEntity(),
            $useCaseListItemResponseDTOFileObject->getBaseNamespace()
        );
    }

    private function createViewModelListItemImplFileObject(
        FileObject $useCaseListItemResponseDTOFileObject
    ): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL,
            $useCaseListItemResponseDTOFileObject->getDomain(),
            $useCaseListItemResponseDTOFileObject->getEntity(),
            $useCaseListItemResponseDTOFileObject->getBaseNamespace()
        );
    }

    /**
     * @param $useCaseListItemResponseDTOFileObject
     *
     * @return FileObject
     */
    private function createViewModelListItemStubFileObject(FileObject $useCaseListItemResponseDTOFileObject): FileObject
    {
        $viewModelListItemStubFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB,
            $useCaseListItemResponseDTOFileObject->getDomain(),
            $useCaseListItemResponseDTOFileObject->getEntity(),
            $useCaseListItemResponseDTOFileObject->getBaseNamespace()
        );

        return $viewModelListItemStubFileObject;
    }

    private function generateFields(FileObject $viewModelListItemImplFileObject): array
    {
        $viewModelListItemFields = $this->getParentAndChildPublicClassFields(
            $viewModelListItemImplFileObject->getClassName()
        );

        return StubFieldUtility::generateStubFieldObjects($viewModelListItemFields, $viewModelListItemImplFileObject);
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
