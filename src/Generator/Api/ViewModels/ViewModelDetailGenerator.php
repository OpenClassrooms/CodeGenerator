<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelDetailSkeletonModelAssembler
     */
    private $viewModelDetailSkeletonModelAssembler;

    /**
     * @param ViewModelDetailGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailFileObject =
            $this->buildViewModelDetailFileObject($generatorRequest->getUseCaseResponseClassName());
        $this->insertFileObject($viewModelDetailFileObject);

        return $viewModelDetailFileObject;
    }

    private function buildViewModelDetailFileObject(string $useCaseResponseClassName): FileObject
    {
        $useCaseDetailResponseDTOFileObject =
            $this->createUseCaseDetailResponseDTOFileObject($useCaseResponseClassName);

        $viewModelDetailFileObject = $this->createViewModeObject($useCaseDetailResponseDTOFileObject);
        $viewModelDetailFileObject->setFields(
            $this->getPublicClassFields($useCaseDetailResponseDTOFileObject->getClassName())
        );
        $viewModelDetailFileObject->setContent($this->generateContent($viewModelDetailFileObject));

        return $viewModelDetailFileObject;
    }

    private function createUseCaseDetailResponseDTOFileObject(string $useCaseDetailResponseClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($useCaseDetailResponseClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createViewModeObject(FileObject $useCaseDetailResponseDTOFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL,
            $useCaseDetailResponseDTOFileObject->getDomain(),
            $useCaseDetailResponseDTOFileObject->getEntity(),
            $useCaseDetailResponseDTOFileObject->getBaseNamespace()
        );
    }

    private function generateContent(FileObject $viewModelDetailFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelDetailFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(FileObject $viewModelDetailFileObject): ViewModelDetailSkeletonModel
    {
        return $this->viewModelDetailSkeletonModelAssembler->create($viewModelDetailFileObject);
    }

    public function setViewModelDetailSkeletonModelAssembler(
        ViewModelDetailSkeletonModelAssembler $viewModelDetailSkeletonModelAssembler
    ): void
    {
        $this->viewModelDetailSkeletonModelAssembler = $viewModelDetailSkeletonModelAssembler;
    }
}
