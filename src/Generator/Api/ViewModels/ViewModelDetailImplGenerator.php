<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailImplSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailImplGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelDetailImplSkeletonModelAssembler
     */
    private $viewModelDetailImplSkeletonModelAssembler;

    /**
     * @param ViewModelDetailImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailImplFileObject = $this->buildViewModelDetailImplFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );
        $this->insertFileObject($viewModelDetailImplFileObject);

        return $viewModelDetailImplFileObject;
    }

    private function buildViewModelDetailImplFileObject(string $useCaseResponseClassName): FileObject
    {
        $viewModelDetailFileObject = $this->createViewModelDetailFileObject(
            $useCaseResponseClassName
        );
        $viewModelDetailImplFileObject = $this->createViewModelDetailImplObject($viewModelDetailFileObject);

        $viewModelDetailImplFileObject->setContent(
            $this->generateContent($viewModelDetailFileObject, $viewModelDetailImplFileObject)
        );

        return $viewModelDetailImplFileObject;
    }

    private function createViewModelDetailFileObject(string $viewModelDetailClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelDetailClassName);

        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL,
            $domain,
            $entity
        );
    }

    private function createViewModelDetailImplObject(FileObject $viewModelDetailFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL,
            $viewModelDetailFileObject->getDomain(),
            $viewModelDetailFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelDetailImplFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelDetailFileObject, $viewModelDetailImplFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelDetailImplFileObject
    ): ViewModelDetailImplSkeletonModel
    {
        return $this->viewModelDetailImplSkeletonModelAssembler->create(
            $viewModelDetailFileObject,
            $viewModelDetailImplFileObject
        );
    }

    public function setViewModelDetailImplSkeletonModelAssembler(
        ViewModelDetailImplSkeletonModelAssembler $viewModelDetailImplSkeletonModelAssembler
    ): void
    {
        $this->viewModelDetailImplSkeletonModelAssembler = $viewModelDetailImplSkeletonModelAssembler;
    }
}
