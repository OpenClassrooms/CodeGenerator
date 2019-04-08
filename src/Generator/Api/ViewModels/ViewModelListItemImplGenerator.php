<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemImplGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelListItemImplSkeletonModelAssembler
     */
    private $viewModelListItemImplSkeletonModelAssembler;

    /**
     * @param ViewModelListItemImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelListItemImplFileObject = $this->buildViewModelListItemImplFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );
        $this->insertFileObject($viewModelListItemImplFileObject);

        return $viewModelListItemImplFileObject;
    }

    private function buildViewModelListItemImplFileObject(string $useCaseResponseClassName): FileObject
    {
        $viewModelListItemFileObject = $this->createViewModelListItemFileObject(
            $useCaseResponseClassName
        );
        $viewModelListItemImplFileObject = $this->createViewModelListItemImplObject($viewModelListItemFileObject);

        $viewModelListItemImplFileObject->setContent(
            $this->generateContent($viewModelListItemFileObject, $viewModelListItemImplFileObject)
        );

        return $viewModelListItemImplFileObject;
    }

    private function createViewModelListItemFileObject(string $viewModelListItemClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($viewModelListItemClassName);

        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createViewModelListItemImplObject(FileObject $viewModelListItemFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL,
            $viewModelListItemFileObject->getDomain(),
            $viewModelListItemFileObject->getEntity(),
            $viewModelListItemFileObject->getBaseNamespace()
        );
    }

    private function generateContent(
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelListItemImplFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelListItemFileObject, $viewModelListItemImplFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelListItemImplFileObject
    ): ViewModelListItemImplSkeletonModel
    {
        return $this->viewModelListItemImplSkeletonModelAssembler->create(
            $viewModelListItemFileObject,
            $viewModelListItemImplFileObject
        );
    }

    public function setViewModelListItemImplSkeletonModelAssembler(
        ViewModelListItemImplSkeletonModelAssembler $viewModelListItemImplSkeletonModelAssembler
    ): void
    {
        $this->viewModelListItemImplSkeletonModelAssembler = $viewModelListItemImplSkeletonModelAssembler;
    }
}
