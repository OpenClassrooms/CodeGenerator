<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelSkeletonModelAssembler
     */
    private $viewModelSkeletonModelAssembler;

    /**
     * @param ViewModelGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelFileObject = $this->buildViewModelFileObject($generatorRequest->getUseCaseResponseClassName());
        $this->insertFileObject($viewModelFileObject);

        return $viewModelFileObject;
    }

    private function buildViewModelFileObject(string $useCaseResponseClassName): FileObject
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseResponseDTOFileObject = $this->createUseCaseResponseDTOFileObject();
        $viewModelFileObject = $this->createViewModelObject();

        $viewModelFileObject->setFields($this->getPublicClassFields($useCaseResponseDTOFileObject->getClassName()));
        $viewModelFileObject->setContent($this->generateContent($viewModelFileObject));

        return $viewModelFileObject;
    }

    private function createUseCaseResponseDTOFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(FileObject $viewModelFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(FileObject $viewModelFileObject): ViewModelSkeletonModel
    {
        return $this->viewModelSkeletonModelAssembler->create($viewModelFileObject);
    }

    public function setViewModelSkeletonModelAssembler(
        ViewModelSkeletonModelAssembler $viewModelSkeletonModelAssembler
    ): void {
        $this->viewModelSkeletonModelAssembler = $viewModelSkeletonModelAssembler;
    }
}
