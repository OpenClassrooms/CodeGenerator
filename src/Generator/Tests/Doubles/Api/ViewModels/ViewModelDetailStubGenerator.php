<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelDetailStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelDetailStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailStubGenerator extends AbstractViewModelGenerator
{
    const DETAIL_RESPONSE = 'DetailResponse';

    /**
     * @var ViewModelDetailStubSkeletonModelAssembler
     */
    private $viewModelDetailStubSkeletonModelAssembler;

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
    ): FileObject
    {
        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject(
            $useCaseResponseClassName
        );
        $useCaseDetailResponseStubFileObject = $this->createUseCaseDetailResponseStubFileObject(
            $useCaseDetailResponseDTOFileObject
        );
        $viewModelDetailImplFileObject = $this->createViewModelDetailImplFileObject(
            $useCaseDetailResponseDTOFileObject
        );
        $viewModelDetailStubFileObject = $this->createViewModelDetailStubFileObject(
            $useCaseDetailResponseDTOFileObject
        );

        $viewModelDetailStubFileObject->setFields($this->generateFields($useCaseDetailResponseDTOFileObject));
        $viewModelDetailStubFileObject->setConsts(
            $this->generateConsts($viewModelDetailStubFileObject)
        );

        $viewModelDetailStubFileObject->setContent(
            $this->generateContent(
                $viewModelDetailStubFileObject,
                $viewModelDetailImplFileObject,
                $useCaseDetailResponseStubFileObject
            )
        );

        return $viewModelDetailStubFileObject;
    }

    private function createUseCaseDetailResponseDTOFileObject(string $viewModelClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $viewModelClassName
        );

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createUseCaseDetailResponseStubFileObject(
        FileObject $useCaseDetailResponseDTOFileObject
    ): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $useCaseDetailResponseDTOFileObject->getDomain(),
            $useCaseDetailResponseDTOFileObject->getEntity(),
            $useCaseDetailResponseDTOFileObject->getBaseNamespace(),
            $useCaseDetailResponseDTOFileObject->getBaseNamespace()
        );
    }

    private function createViewModelDetailImplFileObject(FileObject $useCaseDetailResponseDTOFileObject): FileObject
    {

        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL,
            $useCaseDetailResponseDTOFileObject->getDomain(),
            $useCaseDetailResponseDTOFileObject->getEntity(),
            $useCaseDetailResponseDTOFileObject->getBaseNamespace(),
            $useCaseDetailResponseDTOFileObject->getBaseNamespace()
        );
    }

    private function createViewModelDetailStubFileObject(FileObject $useCaseDetailResponseDTOFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB,
            $useCaseDetailResponseDTOFileObject->getDomain(),
            $useCaseDetailResponseDTOFileObject->getEntity(),
            $useCaseDetailResponseDTOFileObject->getBaseNamespace(),
            $useCaseDetailResponseDTOFileObject->getBaseNamespace()
        );
    }

    private function generateFields(FileObject $useCaseDetailResponseDTOFileObject): array
    {
        $viewModelDetailFields = $this->getParentAndChildPublicClassFields(
            $useCaseDetailResponseDTOFileObject->getClassName()
        );

        return FieldUtility::generateStubFieldObjects($viewModelDetailFields, $useCaseDetailResponseDTOFileObject);
    }

    private function generateConsts(
        FileObject $viewModelDetailStubFileObject
    ): array
    {
        return ConstUtility::generateConstsFromStubFileObject($viewModelDetailStubFileObject, self::DETAIL_RESPONSE);
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
