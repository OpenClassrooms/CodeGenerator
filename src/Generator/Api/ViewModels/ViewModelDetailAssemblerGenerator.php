<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailAssemblerSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailAssemblerGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelDetailAssemblerSkeletonModelAssembler
     */
    private $viewModelDetailAssemblerSkeletonModelAssembler;

    /**
     * @param ViewModelDetailAssemblerGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailAssemblerFileObject = $this->buildViewModelDetailAssemblerFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($viewModelDetailAssemblerFileObject);

        return $viewModelDetailAssemblerFileObject;
    }

    public function buildViewModelDetailAssemblerFileObject(string $useCaseResponseClassName)
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject();
        $viewModelDetailFileObject = $this->createViewModelDetailFileObject();
        $viewModelDetailAssemblerFileObject = $this->createViewModelDetailAssemblerFileObject();

        $viewModelDetailAssemblerFileObject->setContent(
            $this->generateContent(
                $useCaseDetailResponseFileObject,
                $viewModelDetailFileObject,
                $viewModelDetailAssemblerFileObject
            )
        );

        return $viewModelDetailAssemblerFileObject;
    }

    private function createUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
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

    private function createViewModelDetailAssemblerFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $useCaseDetailResponseFileObject,
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelDetailAssemblerFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseDetailResponseFileObject,
            $viewModelDetailFileObject,
            $viewModelDetailAssemblerFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseDetailResponseFileObject,
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelDetailAssemblerFileObject
    ): ViewModelDetailAssemblerSkeletonModel {
        return $this->viewModelDetailAssemblerSkeletonModelAssembler->create(
            $useCaseDetailResponseFileObject,
            $viewModelDetailFileObject,
            $viewModelDetailAssemblerFileObject
        );
    }

    public function setViewModelDetailAssemblerSkeletonModelAssembler(
        ViewModelDetailAssemblerSkeletonModelAssembler $viewModelDetailAssemblerSkeletonModelAssembler
    ): void {
        $this->viewModelDetailAssemblerSkeletonModelAssembler = $viewModelDetailAssemblerSkeletonModelAssembler;
    }
}
