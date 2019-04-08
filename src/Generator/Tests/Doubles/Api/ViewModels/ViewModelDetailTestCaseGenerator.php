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
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
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
        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject($useCaseResponseClassName);
        $viewModelTestCaseFileObject = $this->createViewModelTestCaseFileObject(
            $useCaseDetailResponseDTOFileObject
        );
        $viewModelDetailTestCaseFileObject = $this->createViewModelDetailTestCaseFileObject(
            $useCaseDetailResponseDTOFileObject
        );
        $viewModelDetailFileObject = $this->createViewModelDetailFileObject(
            $useCaseDetailResponseDTOFileObject
        );
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

    protected function createUseCaseDetailResponseDTOFileObject(string $viewModelClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createViewModelTestCaseFileObject(FileObject $viewModelListItemFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
            $viewModelListItemFileObject->getDomain(),
            $viewModelListItemFileObject->getEntity(),
            $viewModelListItemFileObject->getBaseNamespace()
        );
    }

    private function createViewModelDetailFileObject(FileObject $viewModelListItemFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL,
            $viewModelListItemFileObject->getDomain(),
            $viewModelListItemFileObject->getEntity(),
            $viewModelListItemFileObject->getBaseNamespace()
        );
    }

    public function generateContent(
        FileObject $viewModelDetailTestCaseFileObject,
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $viewModelTestCaseFileObject
    ): string
    {
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
    ): ViewModelDetailTestCaseSkeletonModel
    {
        return $this->viewModelDetailTestCaseSkeletonModelAssembler->create(
            $viewModelDetailTestCaseFileObject,
            $useCaseDetailResponseDTOFileObject,
            $viewModelTestCaseFileObject
        );
    }

    public function setViewModelDetailTestCaseSkeletonModelAssembler(
        ViewModelDetailTestCaseSkeletonModelAssembler $viewModelDetailTestCaseSkeletonModelAssembler
    )
    {
        $this->viewModelDetailTestCaseSkeletonModelAssembler = $viewModelDetailTestCaseSkeletonModelAssembler;
    }

    /**
     * @param FileObject $useCaseDetailResponseDTOFileObject
     *
     * @return FileObject
     */
    private function createViewModelDetailTestCaseFileObject(FileObject $useCaseDetailResponseDTOFileObject): FileObject
    {
        $viewModelDetailTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE,
            $useCaseDetailResponseDTOFileObject->getDomain(),
            $useCaseDetailResponseDTOFileObject->getEntity(),
            $useCaseDetailResponseDTOFileObject->getBaseNamespace()
        );

        return $viewModelDetailTestCaseFileObject;
}
}
