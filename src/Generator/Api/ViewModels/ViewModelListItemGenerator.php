<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelListItemSkeletonModelAssembler
     */
    private $viewModelListItemSkeletonModelAssembler;

    /**
     * @param ViewModelListItemGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelListItemFileObject = $this->buildViewModelListItemFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );
        $this->insertFileObject($viewModelListItemFileObject);

        return $viewModelListItemFileObject;
    }

    private function buildViewModelListItemFileObject(string $useCaseResponseClassName): FileObject
    {
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject(
            $useCaseResponseClassName
        );

        $viewModelListItemFileObject = $this->createViewModelListItemFileObject($useCaseDetailResponseFileObject);
        $viewModelFileObject = $this->createViewModel($useCaseDetailResponseFileObject);

        $viewModelListItemFileObject->setContent(
            $this->generateContent($viewModelListItemFileObject, $viewModelFileObject)
        );

        return $viewModelListItemFileObject;
    }

    private function createUseCaseDetailResponseFileObject(string $useCaseDetailResponseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($useCaseDetailResponseClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $domain,
            $entity
        );
    }

    private function createViewModelListItemFileObject(FileObject $useCaseDetailResponseFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity()
        );
    }

    private function createViewModel(FileObject $useCaseDetailResponseFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity()
        );
    }

    private function generateContent(FileObject $viewModelListItemFileObject, FileObject $viewModelFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelListItemFileObject, $viewModelFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelFileObject
    ): ViewModelListItemSkeletonModel
    {
        return $this->viewModelListItemSkeletonModelAssembler->create(
            $viewModelListItemFileObject,
            $viewModelFileObject
        );
    }

    public function setViewModelListItemSkeletonModelAssembler(
        ViewModelListItemSkeletonModelAssembler $viewModelListItemSkeletonModelAssembler
    ): void
    {
        $this->viewModelListItemSkeletonModelAssembler = $viewModelListItemSkeletonModelAssembler;
    }
}
