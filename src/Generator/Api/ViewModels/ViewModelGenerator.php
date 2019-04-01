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
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

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
        $useCaseResponseDTOFileObject = $this->createUseCaseResponseDTOFileObject($useCaseResponseClassName);
        $viewModelFileObject = $this->createViewModelObject($useCaseResponseDTOFileObject);

        $viewModelFileObject->setFields($this->getPublicClassFields($useCaseResponseDTOFileObject->getClassName()));
        $viewModelFileObject->setContent($this->generateContent($viewModelFileObject));

        return $viewModelFileObject;
    }

    private function createUseCaseResponseDTOFileObject(string $useCaseResponseClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createViewModelObject(FileObject $useCaseResponseDTOFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL,
            $useCaseResponseDTOFileObject->getDomain(),
            $useCaseResponseDTOFileObject->getEntity(),
            $useCaseResponseDTOFileObject->getBaseNamespace()
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
    ): void
    {
        $this->viewModelSkeletonModelAssembler = $viewModelSkeletonModelAssembler;
    }
}
