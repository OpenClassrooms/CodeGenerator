<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelTest\ViewModelTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelTest\ViewModelTestSkeletonModelAssembler;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelTestGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelTestSkeletonModelAssembler
     */
    private $viewModelTestSkeletonModelAssembler;

    private function buildResponseFileObject(string $responseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($responseClassName);
        $responseFileObject = $this
            ->createUseCaseResponseFileObject(UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE, $domain, $entity);

        return $responseFileObject;
    }

    private function buildViewModelFileObject(string $responseClassName): FileObject
    {
        $responseFileObject = $this->buildResponseFileObject($responseClassName);

        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($responseClassName);
        $viewModel = $this
            ->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL, $domain, $entity);
        $viewModel->setFields($this->getPublicClassFields($responseFileObject->getClassName()));

        return $viewModel;
    }

    private function createSkeletonModel(FileObject $viewModelFileObject): ViewModelTestSkeletonModel
    {
        return $this->viewModelTestSkeletonModelAssembler->create($viewModelFileObject);
    }

    /**
     * @param ViewModelTestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelFileObject = $this->buildViewModelFileObject($generatorRequest->getResponseClassName());
        $viewModelFileObject->setContent($this->generateContent($viewModelFileObject));
        $this->insertFileObject($viewModelFileObject);

        return $viewModelFileObject;
    }

    private function generateContent(FileObject $viewModelFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    public function setViewModelTestSkeletonModelAssembler(
        ViewModelTestSkeletonModelAssembler $viewModelTestSkeletonModelAssembler
    )
    {
        $this->viewModelTestSkeletonModelAssembler = $viewModelTestSkeletonModelAssembler;
    }
}
