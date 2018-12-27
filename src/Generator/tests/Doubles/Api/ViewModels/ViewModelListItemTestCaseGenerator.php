<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
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
        $viewModelListItemFileObject = $this->createViewListItemFileObject(
            $generatorRequest->getViewModelListItemClassName()
        );
        $viewModelTestCaseFileObject = $this->createViewModelTestCaseFileObject(
            $viewModelListItemFileObject
        );
        $viewModelListItemTestCaseFileObject = $this->buildListItemTestCaseFileObject($viewModelTestCaseFileObject);
        $viewModelListItemTestCaseFileObject->setContent(
            $this->generateContent(
                $viewModelListItemTestCaseFileObject,
                $viewModelTestCaseFileObject,
                $viewModelListItemFileObject
            )
        );
        $this->insertFileObject($viewModelListItemTestCaseFileObject);

        return $viewModelListItemTestCaseFileObject;
    }

    private function createViewListItemFileObject($viewModelListItemClassName)
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelListItemClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM, $domain, $entity);
    }

    private function createViewModelTestCaseFileObject(FileObject $viewModelListItemFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
            $viewModelListItemFileObject->getDomain(),
            $viewModelListItemFileObject->getEntity()
        );
    }

    public function buildListItemTestCaseFileObject(FileObject $viewModelListItemFileObject): FileObject
    {
        $viewModelListItemTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_TEST_CASE,
            $viewModelListItemFileObject->getDomain(),
            $viewModelListItemFileObject->getEntity()
        );
        $viewModelListItemTestCaseFileObject->setFields(
            $this->getPublicClassFields($viewModelListItemFileObject->getClassName())
        );

        return $viewModelListItemTestCaseFileObject;

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
