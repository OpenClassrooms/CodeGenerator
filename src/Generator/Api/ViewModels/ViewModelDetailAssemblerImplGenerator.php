<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailAssemblerImplSkeletonModelBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailAssemblerImplGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelDetailAssemblerImplSkeletonModelBuilder
     */
    private $viewModelDetailAssemblerImplSkeletonModelBuilder;

    /**
     * @param ViewModelDetailAssemblerImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailAssemblerImplFileObject = $this->buildViewModelDetailAssemblerImplFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($viewModelDetailAssemblerImplFileObject);

        return $viewModelDetailAssemblerImplFileObject;
    }

    public function buildViewModelDetailAssemblerImplFileObject(string $useCaseResponseClassName)
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject();
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject();
        $viewModelDetailFileObject = $this->createViewModelDetailFileObject();
        $viewModelDetailAssemblerFileObject = $this->createViewModelDetailAssemblerFileObject();
        $viewModelDetailAssemblerImplFileObject = $this->createViewModelDetailAssemblerImplFileObject();
        $viewModelDetailImplFileObject = $this->createViewModelDetailImplFileObject();

        $viewModelAssemblerTrait = $this->createViewModelAssemblerTraitFileObject();

        $viewModelDetailAssemblerImplFileObject->setFields(
            $this->getPublicClassFields($useCaseDetailResponseDTOFileObject->getClassName())
        );

        $viewModelDetailAssemblerImplFileObject->setContent(
            $this->generateContent(
                [
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE => $useCaseDetailResponseFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL                         => $viewModelDetailFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL                    => $viewModelDetailImplFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT                => $viewModelAssemblerTrait,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER               => $viewModelDetailAssemblerFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL          => $viewModelDetailAssemblerImplFileObject,
                ]
            )
        );

        return $viewModelDetailAssemblerImplFileObject;
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

    private function createViewModelDetailAssemblerImplFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelDetailImplFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelAssemblerTraitFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    /**
     * @param FileObject[]
     */
    private function generateContent(array $fileObjects): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    /**
     * @param FileObject[]
     */
    private function createSkeletonModel(array $fileObjects): ViewModelDetailAssemblerImplSkeletonModel
    {
        return $this->viewModelDetailAssemblerImplSkeletonModelBuilder->create()
            ->withUseCaseDetailResponse(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE]
            )
            ->withViewModelDetail($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL])
            ->withViewModelDetailImpl($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL])
            ->withViewModelAssemblerTrait($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT])
            ->withViewModelDetailAssembler($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER])
            ->withViewModelDetailAssemblerImpl(
                $fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL]
            )
            ->build();
    }

    public function setViewModelDetailAssemblerImplSkeletonModelBuilder(
        ViewModelDetailAssemblerImplSkeletonModelBuilder $viewModelDetailAssemblerImplSkeletonModelBuilder
    ): void {
        $this->viewModelDetailAssemblerImplSkeletonModelBuilder = $viewModelDetailAssemblerImplSkeletonModelBuilder;
    }
}
