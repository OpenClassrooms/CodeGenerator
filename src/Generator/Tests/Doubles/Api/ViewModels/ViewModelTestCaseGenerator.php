<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelTestCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelTestCaseGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelTestCaseSkeletonModelAssembler
     */
    private $viewModelTestCaseSkeletonModelAssembler;

    /**
     * @param ViewModelTestCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseResponseDTOFileObject = $this->createUseCaseResponseDTOFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );
        $viewModelTestCaseFileObject = $this->buildTestCaseFileObject($useCaseResponseDTOFileObject);

        return $viewModelTestCaseFileObject;

    }

    protected function createUseCaseResponseDTOFileObject(string $useCaseResponseClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    public function buildTestCaseFileObject(FileObject $useCaseResponseDTOFileObject): FileObject
    {
        $viewModelTestCaseFileObject = $this->createViewModelTestCaseFileObject($useCaseResponseDTOFileObject);
        $viewModelFileObject = $this->createViewModelObject($useCaseResponseDTOFileObject);
        $viewModelTestCaseFileObject->setFields(
            $this->getPublicClassFields($useCaseResponseDTOFileObject->getClassName())
        );
        $viewModelTestCaseFileObject->setContent(
            $this->generateContent($viewModelTestCaseFileObject, $viewModelFileObject)
        );
        $this->insertFileObject($viewModelTestCaseFileObject);

        return $viewModelTestCaseFileObject;

    }

    private function createViewModelTestCaseFileObject(FileObject $useCaseResponseDTOFileObject): FileObject
    {
        $viewModelTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
            $useCaseResponseDTOFileObject->getDomain(),
            $useCaseResponseDTOFileObject->getEntity(),
            $useCaseResponseDTOFileObject->getBaseNamespace()
        );

        return $viewModelTestCaseFileObject;
    }

    private function createViewModelObject(FileObject $useCaseResponseDTOFileObject): FileObject
    {
        $viewModelTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL,
            $useCaseResponseDTOFileObject->getDomain(),
            $useCaseResponseDTOFileObject->getEntity(),
            $useCaseResponseDTOFileObject->getBaseNamespace()
        );

        return $viewModelTestCaseFileObject;
    }

    public function generateContent(
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelTestCaseFileObject, $viewModelFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelFileObject
    ): ViewModelTestCaseSkeletonModel
    {
        return $this->viewModelTestCaseSkeletonModelAssembler->create(
            $viewModelTestCaseFileObject,
            $viewModelFileObject
        );
    }

    public function setViewModelTestCaseSkeletonModelAssembler(
        ViewModelTestCaseSkeletonModelAssembler $viewModelTestCaseSkeletonModelAssembler
    ): void
    {
        $this->viewModelTestCaseSkeletonModelAssembler = $viewModelTestCaseSkeletonModelAssembler;
    }
}
