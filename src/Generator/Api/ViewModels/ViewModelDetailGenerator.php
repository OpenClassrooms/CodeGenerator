<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailSkeletonModelAssembler;

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
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseDetailResponseDTOFileObject =
            $this->createUseCaseDetailResponseDTOFileObject();

        $viewModelDetailFileObject = $this->createViewModeObject();
        $viewModelDetailFileObject->setFields(
            $this->getPublicClassFields($useCaseDetailResponseDTOFileObject->getClassName())
        );
        $viewModelDetailFileObject->setContent($this->generateContent($viewModelDetailFileObject));

        return $viewModelDetailFileObject;
    }

    private function createUseCaseDetailResponseDTOFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModeObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
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
    ): void {
        $this->viewModelDetailSkeletonModelAssembler = $viewModelDetailSkeletonModelAssembler;
    }
}
