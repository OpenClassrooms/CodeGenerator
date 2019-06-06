<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelDetailTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelDetailTestCaseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailTestCaseGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelDetailTestCaseSkeletonModelAssembler
     */
    private $viewModelDetailTestCaseSkeletonModelAssembler;

    /**
     * @param ViewModelDetailTestCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailTestCaseFileObject = $this->buildDetailTestCaseFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );
        $this->insertFileObject($viewModelDetailTestCaseFileObject);

        return $viewModelDetailTestCaseFileObject;
    }

    public function buildDetailTestCaseFileObject(string $useCaseResponseClassName): FileObject
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject();
        $viewModelDetailFileObject = $this->createViewModelDetailFileObject();
        $viewModelDetailTestCaseFileObject = $this->createViewModelDetailTestCaseFileObject();
        $viewModelTestCaseFileObject = $this->createViewModelTestCaseFileObject();
        $viewModelDetailTestCaseFileObject->setFields(
            $this->getPublicClassFields($useCaseDetailResponseDTOFileObject->getClassName())
        );
        $viewModelDetailTestCaseFileObject->setContent(
            $this->generateContent(
                $viewModelDetailTestCaseFileObject,
                $viewModelDetailFileObject,
                $viewModelTestCaseFileObject
            )
        );

        return $viewModelDetailTestCaseFileObject;

    }

    protected function createUseCaseDetailResponseDTOFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelDetailFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelDetailTestCaseFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelTestCaseFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    public function generateContent(
        FileObject $viewModelDetailTestCaseFileObject,
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $viewModelTestCaseFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $viewModelDetailTestCaseFileObject,
            $useCaseDetailResponseDTOFileObject,
            $viewModelTestCaseFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelDetailTestCaseFileObject,
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $viewModelTestCaseFileObject
    ): ViewModelDetailTestCaseSkeletonModel {
        return $this->viewModelDetailTestCaseSkeletonModelAssembler->create(
            $viewModelDetailTestCaseFileObject,
            $useCaseDetailResponseDTOFileObject,
            $viewModelTestCaseFileObject
        );
    }

    public function setViewModelDetailTestCaseSkeletonModelAssembler(
        ViewModelDetailTestCaseSkeletonModelAssembler $viewModelDetailTestCaseSkeletonModelAssembler
    ) {
        $this->viewModelDetailTestCaseSkeletonModelAssembler = $viewModelDetailTestCaseSkeletonModelAssembler;
    }
}
