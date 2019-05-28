<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailAssemblerSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

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
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject($useCaseResponseClassName);
        $viewModelDetailFileObject = $this->createViewModelDetailFileObject($useCaseDetailResponseFileObject);
        $viewModelDetailAssemblerFileObject = $this->createViewModelDetailAssemblerFileObject(
            $useCaseDetailResponseFileObject
        );

        $viewModelDetailAssemblerFileObject->setContent(
            $this->generateContent(
                $useCaseDetailResponseFileObject,
                $viewModelDetailFileObject,
                $viewModelDetailAssemblerFileObject
            )
        );

        return $viewModelDetailAssemblerFileObject;
    }

    private function createUseCaseDetailResponseFileObject(string $useCaseResponseClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $domain,
            $entity,
            $baseNamespace
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

    private function createViewModelDetailAssemblerFileObject(FileObject $useCaseDetailResponseFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity(),
            $useCaseDetailResponseFileObject->getBaseNamespace()
        );
    }

    private function generateContent(
        FileObject $useCaseDetailResponseFileObject,
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelDetailAssemblerFileObject
    ): string
    {
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
    ): ViewModelDetailAssemblerSkeletonModel
    {
        return $this->viewModelDetailAssemblerSkeletonModelAssembler->create(
            $useCaseDetailResponseFileObject,
            $viewModelDetailFileObject,
            $viewModelDetailAssemblerFileObject
        );
    }

    public function setViewModelDetailAssemblerSkeletonModelAssembler(
        ViewModelDetailAssemblerSkeletonModelAssembler $viewModelDetailAssemblerSkeletonModelAssembler
    ): void
    {
        $this->viewModelDetailAssemblerSkeletonModelAssembler = $viewModelDetailAssemblerSkeletonModelAssembler;
    }
}
