<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseSkeletonModelAssembler;

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
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $viewModelListItemTestCaseFileObject = $this->buildListItemTestCaseFileObject(
            $useCaseListItemResponseFileObject
        );

        $this->insertFileObject($viewModelListItemTestCaseFileObject);

        return $viewModelListItemTestCaseFileObject;
    }

    private function createUseCaseListItemResponseFileObject($useCaseResponseClassName)
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $domain,
            $entity
        );
    }

    public function buildListItemTestCaseFileObject(FileObject $useCaseListItemResponseFileObject): FileObject
    {
        $viewModelListItemTestCaseFileObject = $this->createViewModelListItemTestCaseFileObject(
            $useCaseListItemResponseFileObject
        );
        $viewModelTestCaseFileObject = $this->createViewModelTestCaseFileObject(
            $useCaseListItemResponseFileObject
        );
        $viewModelListItemFileObject = $this->createViewModelListItemFileObject(
            $useCaseListItemResponseFileObject
        );

        $viewModelListItemTestCaseFileObject->setFields(
            $this->getPublicClassFields($useCaseListItemResponseFileObject->getClassName())
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
        FileObject $useCaseListItemResponseFileObject
    ): FileObject
    {
        $viewModelListItemTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_TEST_CASE,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity()
        );

        return $viewModelListItemTestCaseFileObject;
    }

    private function createViewModelTestCaseFileObject(FileObject $useCaseListItemResponseFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
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
