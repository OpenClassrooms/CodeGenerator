<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelDetailStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelDetailStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailStubGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelDetailStubSkeletonModelAssembler
     */
    private $viewModelDetailStubSkeletonModelAssembler;

    /**
     * @param ViewModelDetailStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailStubFileObject = $this->buildViewModelDetailStubFileObject($generatorRequest->getViewModelDetailClassName());

        $this->insertFileObject($viewModelDetailStubFileObject);

        return $viewModelDetailStubFileObject;
    }

    private function buildViewModelDetailStubFileObject(
        string $viewModelClassName
    ): FileObject
    {
        $viewModelDetailFileObject = $this->createViewModelDetailFileObject($viewModelClassName);
        $useCaseDetailResponseStubFileObject = $this->createUseCaseDetailResponseStubFileObject(
            $viewModelDetailFileObject
        );
        $viewModelDetailImplFileObject = $this->createViewModelDetailImplFileObject($viewModelDetailFileObject);
        $viewModelDetailStubFileObject = $this->createViewModelDetailStubFileObject($viewModelDetailFileObject);

        $viewModelDetailStubFileObject->setConsts($this->generateConsts($useCaseDetailResponseStubFileObject));
        $viewModelDetailStubFileObject->setFields($this->generateFields($viewModelDetailFileObject));

        $viewModelDetailStubFileObject->setContent(
            $this->generateContent(
                $viewModelDetailStubFileObject,
                $viewModelDetailImplFileObject,
                $useCaseDetailResponseStubFileObject
            )
        );

        return $viewModelDetailStubFileObject;
    }

    private function createViewModelDetailFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_DETAIL, $domain, $entity);
    }

    private function createUseCaseDetailResponseStubFileObject(FileObject $viewModelDetailFileObject): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $viewModelDetailFileObject->getDomain(),
            $viewModelDetailFileObject->getEntity()
        );
    }

    private function createViewModelDetailImplFileObject(FileObject $viewModelDetailFileObject): FileObject
    {

        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL,
            $viewModelDetailFileObject->getDomain(),
            $viewModelDetailFileObject->getEntity()
        );
    }

    private function createViewModelDetailStubFileObject(FileObject $viewModelDetailFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB,
            $viewModelDetailFileObject->getDomain(),
            $viewModelDetailFileObject->getEntity()
        );
    }

    private function generateConsts(FileObject $useCaseDetailResponseStubFileObject): array
    {
        $useCaseDetailResponseStubFileObject->setConsts(
            $this->getClassConstants($useCaseDetailResponseStubFileObject->getClassName())
        );

        return ConstUtility::generateConstsFromStubReference($useCaseDetailResponseStubFileObject);
    }

    private function generateFields(FileObject $viewModelDetailFileObject): array
    {
        $viewModelDetailFields = $this->getParentAndChildPublicClassFields($viewModelDetailFileObject->getClassName());

        return FieldUtility::generateStubFieldObjects($viewModelDetailFields, $viewModelDetailFileObject);
    }

    private function generateContent(
        FileObject $viewModelDetailStubFileObject,
        FileObject $viewModelDetailImplFileObject,
        FileObject $useCaseDetailResponseStubFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $viewModelDetailStubFileObject,
            $viewModelDetailImplFileObject,
            $useCaseDetailResponseStubFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $stubFileObject,
        FileObject $viewModelDetailImplFileObject,
        FileObject $useCaseDetailResponseStubFileObject
    ): ViewModelDetailStubSkeletonModel
    {
        return $this->viewModelDetailStubSkeletonModelAssembler->create(
            $stubFileObject,
            $viewModelDetailImplFileObject,
            $useCaseDetailResponseStubFileObject
        );
    }

    public function setViewModelDetailStubSkeletonModelAssembler(
        ViewModelDetailStubSkeletonModelAssembler $viewModelDetailStubSkeletonModelAssembler
    ): void
    {
        $this->viewModelDetailStubSkeletonModelAssembler = $viewModelDetailStubSkeletonModelAssembler;
    }
}
