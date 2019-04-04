<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemTestCaseGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelListItemTestCaseSkeletonModelAssembler
     */
    private $viewModelListItemTestCaseSkeletonModelAssembler;

    /**
     * @param ViewModelListItemTestCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseListItemResponseDTOFileObject = $this->createUseCaseListItemResponseDTOFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $viewModelListItemTestCaseFileObject = $this->buildListItemTestCaseFileObject(
            $useCaseListItemResponseDTOFileObject
        );

        $this->insertFileObject($viewModelListItemTestCaseFileObject);

        return $viewModelListItemTestCaseFileObject;
    }

    private function createUseCaseListItemResponseDTOFileObject($useCaseResponseClassName)
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    public function buildListItemTestCaseFileObject(FileObject $useCaseListItemResponseDTOFileObject): FileObject
    {
        $viewModelListItemTestCaseFileObject = $this->createViewModelListItemTestCaseFileObject(
            $useCaseListItemResponseDTOFileObject
        );
        $viewModelTestCaseFileObject = $this->createViewModelTestCaseFileObject(
            $useCaseListItemResponseDTOFileObject
        );
        $viewModelListItemFileObject = $this->createViewModelListItemFileObject(
            $useCaseListItemResponseDTOFileObject
        );

        $viewModelListItemTestCaseFileObject->setFields(
            $this->getPublicClassFields($useCaseListItemResponseDTOFileObject->getClassName())
        );

        $viewModelListItemTestCaseFileObject->setContent(
            $this->generateContent(
                $viewModelListItemTestCaseFileObject,
                $viewModelTestCaseFileObject,
                $viewModelListItemFileObject
            )
        );

        return $viewModelListItemTestCaseFileObject;

    }

    private function createViewModelListItemTestCaseFileObject(
        FileObject $useCaseListItemResponseDTOFileObject
    ): FileObject
    {
        $viewModelListItemTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_TEST_CASE,
            $useCaseListItemResponseDTOFileObject->getDomain(),
            $useCaseListItemResponseDTOFileObject->getEntity(),
            $useCaseListItemResponseDTOFileObject->getBaseNamespace()
        );

        return $viewModelListItemTestCaseFileObject;
    }

    private function createViewModelTestCaseFileObject(FileObject $useCaseListItemResponseDTOFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
            $useCaseListItemResponseDTOFileObject->getDomain(),
            $useCaseListItemResponseDTOFileObject->getEntity(),
            $useCaseListItemResponseDTOFileObject->getBaseNamespace()
        );
    }

    private function createViewModelListItemFileObject(FileObject $useCaseListItemResponseDTOFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM,
            $useCaseListItemResponseDTOFileObject->getDomain(),
            $useCaseListItemResponseDTOFileObject->getEntity(),
            $useCaseListItemResponseDTOFileObject->getBaseNamespace()
        );
    }

    public function generateContent(
        FileObject $viewModelListItemTestCaseFileObject,
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelListItemFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $viewModelListItemTestCaseFileObject,
            $viewModelTestCaseFileObject,
            $viewModelListItemFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelListItemTestCaseFileObject,
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelListItemFileObject
    ): ViewModelListItemTestCaseSkeletonModel
    {
        return $this->viewModelListItemTestCaseSkeletonModelAssembler->create(
            $viewModelListItemTestCaseFileObject,
            $viewModelTestCaseFileObject,
            $viewModelListItemFileObject
        );
    }

    public function setViewModelListItemTestCaseSkeletonModelAssembler(
        ViewModelListItemTestCaseSkeletonModelAssembler $viewModelListItemTestCaseSkeletonModelAssembler
    )
    {
        $this->viewModelListItemTestCaseSkeletonModelAssembler = $viewModelListItemTestCaseSkeletonModelAssembler;
    }
}
