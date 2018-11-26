<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetail\ViewModelDetailSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetail\ViewModelDetailSkeletonModelAssembler;

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
        $viewModelDetailFileObject = $this->buildViewModelDetailFileObject(
            $generatorRequest->getDetailResponseClassName()
        );
        $viewModelDetailFileObject->setContent($this->generateContent($viewModelDetailFileObject));
        $this->insertFileObject($viewModelDetailFileObject);

        return $viewModelDetailFileObject;
    }

    private function buildViewModelDetailFileObject(string $useCaseDetailResponseClassName): FileObject
    {
        $useCaseDetailResponseFileObject = $this->createDetailResponseFileObject($useCaseDetailResponseClassName);

        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($useCaseDetailResponseClassName);
        $viewModelDetailFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL,
            $domain,
            $entity
        );
        $viewModelDetailFileObject->setFields(
            $this->getPublicClassFields($useCaseDetailResponseFileObject->getClassName())
        );

        return $viewModelDetailFileObject;
    }

    private function createDetailResponseFileObject(string $useCaseDetailResponseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($useCaseDetailResponseClassName);
        $useCaseDetailResponseFileObject = $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $domain,
            $entity
        );

        return $useCaseDetailResponseFileObject;
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
