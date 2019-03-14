<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailAssemblerImplSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
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
        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject(
            $useCaseResponseClassName
        );
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject(
            $useCaseDetailResponseDTOFileObject
        );
        $viewModelDetailFileObject = $this->createViewModelDetailFileObject($useCaseDetailResponseDTOFileObject);
        $viewModelDetailAssemblerFileObject = $this->createViewModelDetailAssemblerFileObject(
            $useCaseDetailResponseDTOFileObject
        );
        $viewModelDetailAssemblerImplFileObject = $this->createViewModelDetailAssemblerImplFileObject(
            $useCaseDetailResponseDTOFileObject
        );
        $viewModelDetailImplFileObject = $this->createViewModelDetailImplFileObject(
            $useCaseDetailResponseDTOFileObject
        );

        $viewModelAssemblerTrait = $this->createViewModelAssemblerTraitFileObject($useCaseDetailResponseDTOFileObject);

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

    private function createUseCaseDetailResponseDTOFileObject(string $useCaseResponseClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createUseCaseDetailResponseFileObject(FileObject $useCaseDetailResponseFileObject): FileObject
    {

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity(),
            $useCaseDetailResponseFileObject->getBaseNamespace()
        );
    }

    private function createViewModelDetailFileObject(FileObject $useCaseDetailResponseFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity(),
            $useCaseDetailResponseFileObject->getBaseNamespace()
        );
    }

    private function createViewModelDetailAssemblerFileObject(
        FileObject $useCaseDetailResponseFileObject
    ): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity(),
            $useCaseDetailResponseFileObject->getBaseNamespace()
        );
    }

    private function createViewModelDetailAssemblerImplFileObject(
        FileObject $useCaseDetailResponseFileObject
    ): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity(),
            $useCaseDetailResponseFileObject->getBaseNamespace()
        );
    }

    private function createViewModelDetailImplFileObject(
        FileObject $useCaseDetailResponseFileObject
    ): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity(),
            $useCaseDetailResponseFileObject->getBaseNamespace()
        );
    }

    private function createViewModelAssemblerTraitFileObject(FileObject $useCaseDetailResponseFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TRAIT,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity(),
            $useCaseDetailResponseFileObject->getBaseNamespace()
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
    ): void
    {
        $this->viewModelDetailAssemblerImplSkeletonModelBuilder = $viewModelDetailAssemblerImplSkeletonModelBuilder;
    }
}
