<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractGenericUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GenericUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GenericUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GenericUseCaseTestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseTestGenerator extends AbstractGenericUseCaseGenerator
{
    /**
     * @var GenericUseCaseTestSkeletonModelAssembler
     */
    private $genericUseCaseTestSkeletonModelAssembler;

    /**
     * @param GenericUseCaseTestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseTestFileObject = $this->buildGenericUseCaseTestFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($genericUseCaseTestFileObject);

        return $genericUseCaseTestFileObject;
    }

    private function buildGenericUseCaseTestFileObject(string $useCaseResponseClassName): FileObject
    {
        $genericUseCaseFileObject = $this->createGenericUseCaseFileObject(
            $useCaseResponseClassName
        );
        $genericUseCaseTestFileObject = $this->createGenericUseCaseTestFileObject($genericUseCaseFileObject);

        $genericUseCaseRequestDTOFileObject = $this->createGenericUseCaseRequestDTOFileObject(
            $genericUseCaseFileObject
        );
        $genericUseCaseRequestBuilderImplFileObject = $this->createGenericUseCaseRequestBuilderImplFileObject(
            $genericUseCaseFileObject
        );

        $genericUseCaseTestFileObject->setContent(
            $this->generateContent(
                $genericUseCaseTestFileObject,
                $genericUseCaseRequestDTOFileObject,
                $genericUseCaseRequestBuilderImplFileObject,
                $genericUseCaseFileObject
            )
        );

        return $genericUseCaseTestFileObject;
    }

    private function createGenericUseCaseFileObject(
        string $useCaseResponseClassName
    ): FileObject
    {
        [$domain, $entity] = FileObjectUtility::getDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE,
            $domain,
            $entity
        );
    }

    private function createGenericUseCaseTestFileObject(FileObject $genericUseCaseFileObject): FileObject
    {

        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_TEST,
            $genericUseCaseFileObject->getDomain(),
            $genericUseCaseFileObject->getEntity()
        );
    }

    private function createGenericUseCaseRequestDTOFileObject(FileObject $genericUseCaseFileObject): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_DTO,
            $genericUseCaseFileObject->getDomain(),
            $genericUseCaseFileObject->getEntity()
        );
    }

    private function createGenericUseCaseRequestBuilderImplFileObject(
        FileObject $genericUseCaseFileObject
    ): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER_IMPL,
            $genericUseCaseFileObject->getDomain(),
            $genericUseCaseFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $genericUseCaseTestFileObject,
        FileObject $genericUseCaseRequestDTOFileObject,
        FileObject $genericUseCaseRequestBuilderImplFileObject,
        FileObject $genericUseCaseFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $genericUseCaseTestFileObject,
            $genericUseCaseRequestDTOFileObject,
            $genericUseCaseRequestBuilderImplFileObject,
            $genericUseCaseFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $genericUseCaseTestFileObject,
        FileObject $genericUseCaseRequestDTOFileObject,
        FileObject $genericUseCaseRequestBuilderImplFileObject,
        FileObject $genericUseCaseFileObject
    ): GenericUseCaseTestSkeletonModel
    {
        return $this->genericUseCaseTestSkeletonModelAssembler->create(
            $genericUseCaseTestFileObject,
            $genericUseCaseRequestDTOFileObject,
            $genericUseCaseRequestBuilderImplFileObject,
            $genericUseCaseFileObject
        );
    }

    public function setGenericUseCaseTestSkeletonModelAssembler(
        GenericUseCaseTestSkeletonModelAssembler $genericUseCaseTestSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseTestSkeletonModelAssembler = $genericUseCaseTestSkeletonModelAssembler;
    }
}
