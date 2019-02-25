<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractGenericUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseRequestBuilderImplGenerator extends AbstractGenericUseCaseGenerator
{
    /**
     * @var GenericUseCaseRequestBuilderImplSkeletonModelAssembler
     */
    private $genericUseCaseRequestBuilderImplSkeletonModelAssembler;

    /**
     * @param GenericUseCaseRequestBuilderImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseRequestBuilderImplFileObject = $this->buildGenericUseCaseRequestBuilderImplFileObject(
            $generatorRequest->getDomain(),
            $generatorRequest->getUseCaseName()
        );

        $this->insertFileObject($genericUseCaseRequestBuilderImplFileObject);

        return $genericUseCaseRequestBuilderImplFileObject;
    }

    private function buildGenericUseCaseRequestBuilderImplFileObject(string $domain, string $useCaseName): FileObject
    {
        $genericUseCaseRequestBuilderImplFileObject = $this->createGenericUseCaseRequestBuilderImplFileObject(
            $domain,
            $useCaseName
        );

        $genericUseCaseRequestBuilderFileObject = $this->createGenericUseCaseRequestBuilderFileObject(
            $genericUseCaseRequestBuilderImplFileObject
        );

        $genericUseCaseRequestFileObject = $this->createGenericUseCaseRequestFileObject(
            $genericUseCaseRequestBuilderImplFileObject
        );

        $genericUseCaseRequestDTOFileObject = $this->createGenericUseCaseRequestDTOFileObject(
            $genericUseCaseRequestBuilderImplFileObject
        );

        $genericUseCaseRequestBuilderImplFileObject->setContent(
            $this->generateContent(
                $genericUseCaseRequestBuilderImplFileObject,
                $genericUseCaseRequestBuilderFileObject,
                $genericUseCaseRequestFileObject,
                $genericUseCaseRequestDTOFileObject
            )
        );

        return $genericUseCaseRequestBuilderImplFileObject;
    }

    private function createGenericUseCaseRequestBuilderImplFileObject(string $domain, string $useCaseName): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER_IMPL,
            $domain,
            $useCaseName
        );
    }

    private function createGenericUseCaseRequestBuilderFileObject(
        FileObject $genericUseCaseRequestBuilderImplFileObject
    ): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER,
            $genericUseCaseRequestBuilderImplFileObject->getDomain(),
            $genericUseCaseRequestBuilderImplFileObject->getEntity()
        );
    }

    private function createGenericUseCaseRequestFileObject(
        FileObject $genericUseCaseRequestBuilderImplFileObject
    ): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST,
            $genericUseCaseRequestBuilderImplFileObject->getDomain(),
            $genericUseCaseRequestBuilderImplFileObject->getEntity()
        );
    }

    private function createGenericUseCaseRequestDTOFileObject(
        FileObject $genericUseCaseRequestBuilderImplFileObject
    ): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_DTO,
            $genericUseCaseRequestBuilderImplFileObject->getDomain(),
            $genericUseCaseRequestBuilderImplFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $genericUseCaseRequestBuilderImplFileObject,
        FileObject $genericUseCaseRequestBuilderFileObject,
        FileObject $genericUseCaseRequestFileObject,
        FileObject $genericUseCaseRequestDTOFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $genericUseCaseRequestBuilderImplFileObject,
            $genericUseCaseRequestBuilderFileObject,
            $genericUseCaseRequestFileObject,
            $genericUseCaseRequestDTOFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $genericUseCaseRequestBuilderImplFileObject,
        FileObject $genericUseCaseRequestBuilderFileObject,
        FileObject $genericUseCaseRequestFileObject,
        FileObject $genericUseCaseRequestDTOFileObject
    ): GenericUseCaseRequestBuilderImplSkeletonModel
    {
        return $this->genericUseCaseRequestBuilderImplSkeletonModelAssembler->create(
            $genericUseCaseRequestBuilderImplFileObject,
            $genericUseCaseRequestBuilderFileObject,
            $genericUseCaseRequestFileObject,
            $genericUseCaseRequestDTOFileObject
        );
    }

    public function setGenericUseCaseRequestBuilderImplSkeletonModelAssembler(
        GenericUseCaseRequestBuilderImplSkeletonModelAssembler $genericUseCaseRequestBuilderImplSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseRequestBuilderImplSkeletonModelAssembler = $genericUseCaseRequestBuilderImplSkeletonModelAssembler;
    }
}
