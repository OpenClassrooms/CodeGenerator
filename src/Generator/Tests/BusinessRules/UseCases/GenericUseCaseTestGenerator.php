<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractGenericUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GenericUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GenericUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GenericUseCaseTestSkeletonModelAssembler;

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
            $generatorRequest->getDomain(),
            $generatorRequest->getUseCaseName()
        );

        $this->insertFileObject($genericUseCaseTestFileObject);

        return $genericUseCaseTestFileObject;
    }

    private function buildGenericUseCaseTestFileObject(string $domain, string $useCaseName): FileObject
    {
        $genericUseCaseFileObject = $this->createGenericUseCaseFileObject(
            $domain,
            $useCaseName
        );
        $genericUseCaseTestFileObject = $this->createGenericUseCaseTestFileObject($domain, $useCaseName);

        $genericUseCaseRequestDTOFileObject = $this->createGenericUseCaseRequestDTOFileObject($domain, $useCaseName);
        $genericUseCaseRequestBuilderImplFileObject = $this->createGenericUseCaseRequestBuilderImplFileObject(
            $domain,
            $useCaseName
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

    private function createGenericUseCaseFileObject(string $domain, string $useCaseName): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE,
            $domain,
            $useCaseName
        );
    }

    private function createGenericUseCaseTestFileObject(string $domain, string $useCaseName): FileObject
    {

        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_TEST,
            $domain,
            $useCaseName
        );
    }

    private function createGenericUseCaseRequestDTOFileObject(string $domain, string $useCaseName): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_DTO,
            $domain,
            $useCaseName
        );
    }

    private function createGenericUseCaseRequestBuilderImplFileObject(string $domain, string $useCaseName): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER_IMPL,
            $domain,
            $useCaseName
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
