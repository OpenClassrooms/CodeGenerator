<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\StubFieldObjectTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelDetailStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelDetailStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\StubFieldUtility;

final class ViewModelDetailStubGenerator extends AbstractViewModelGenerator
{
    use StubFieldObjectTrait;

    public const DETAIL_RESPONSE = 'DetailResponse';

    private ViewModelDetailStubSkeletonModelAssembler $viewModelDetailStubSkeletonModelAssembler;

    /**
     * @param ViewModelDetailStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailStubFileObject = $this->buildViewModelDetailStubFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($viewModelDetailStubFileObject);

        return $viewModelDetailStubFileObject;
    }

    private function buildViewModelDetailStubFileObject(
        string $useCaseResponseClassName
    ): FileObject {
        $this->initFileObjectParameter($useCaseResponseClassName);

        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject();
        $useCaseDetailResponseStubFileObject = $this->createUseCaseDetailResponseStubFileObject();
        $viewModelDetailFileObject = $this->createViewModelDetailFileObject();
        $viewModelDetailStubFileObject = $this->createViewModelDetailStubFileObject();

        $viewModelDetailStubFileObject->setFields($this->generateFields($useCaseDetailResponseDTOFileObject));
        $viewModelDetailStubFileObject->setConsts(
            $this->generateConsts($viewModelDetailStubFileObject)
        );

        $viewModelDetailStubFileObject->setContent(
            $this->generateContent(
                $viewModelDetailStubFileObject,
                $viewModelDetailFileObject,
                $useCaseDetailResponseStubFileObject
            )
        );

        return $viewModelDetailStubFileObject;
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

    private function createUseCaseDetailResponseStubFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
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

    private function createViewModelDetailStubFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateFields(FileObject $useCaseDetailResponseDTOFileObject): array
    {
        $viewModelDetailFields = $this->getPublicTraitAndClassFields(
            $useCaseDetailResponseDTOFileObject->getClassName()
        );

        $stubFieldObjects = StubFieldUtility::generateStubFieldObjects($viewModelDetailFields);

        return $this->buildStubFieldObjects($useCaseDetailResponseDTOFileObject, $stubFieldObjects);
    }

    private function generateConsts(FileObject $responseEntityStub): array
    {
        return ConstUtility::generateConstsFromStubFileObject($responseEntityStub, self::DETAIL_RESPONSE);
    }

    private function generateContent(
        FileObject $viewModelDetailStubFileObject,
        FileObject $viewModelDetailFileObject,
        FileObject $useCaseDetailResponseStubFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $viewModelDetailStubFileObject,
            $viewModelDetailFileObject,
            $useCaseDetailResponseStubFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $stubFileObject,
        FileObject $viewModelDetailFileObject,
        FileObject $useCaseDetailResponseStubFileObject
    ): ViewModelDetailStubSkeletonModel {
        return $this->viewModelDetailStubSkeletonModelAssembler->create(
            $stubFileObject,
            $viewModelDetailFileObject,
            $useCaseDetailResponseStubFileObject
        );
    }

    public function setViewModelDetailStubSkeletonModelAssembler(
        ViewModelDetailStubSkeletonModelAssembler $assembler
    ): void {
        $this->viewModelDetailStubSkeletonModelAssembler = $assembler;
    }
}
