<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplSkeletonModelAssembler;

class GenericUseCaseRequestBuilderImplGenerator extends AbstractUseCaseGenerator
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
            $domain,
            $useCaseName
        );

        $genericUseCaseRequestFileObject = $this->createGenericUseCaseRequestFileObject(
            $domain,
            $useCaseName
        );

        $genericUseCaseRequestDTOFileObject = $this->createGenericUseCaseRequestDTOFileObject(
            $domain,
            $useCaseName
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
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER_IMPL,
            $domain,
            $useCaseName
        );
    }

    private function createGenericUseCaseRequestBuilderFileObject(string $domain, string $useCaseName): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER,
            $domain,
            $useCaseName
        );
    }

    private function createGenericUseCaseRequestFileObject(string $domain, string $useCaseName): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST,
            $domain,
            $useCaseName
        );
    }

    private function createGenericUseCaseRequestDTOFileObject(string $domain, string $useCaseName): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_DTO,
            $domain,
            $useCaseName
        );
    }

    private function generateContent(
        FileObject $genericUseCaseRequestBuilderImplFileObject,
        FileObject $genericUseCaseRequestBuilderFileObject,
        FileObject $genericUseCaseRequestFileObject,
        FileObject $genericUseCaseRequestDTOFileObject
    ): string {
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
    ): GenericUseCaseRequestBuilderImplSkeletonModel {
        return $this->genericUseCaseRequestBuilderImplSkeletonModelAssembler->create(
            $genericUseCaseRequestBuilderImplFileObject,
            $genericUseCaseRequestBuilderFileObject,
            $genericUseCaseRequestFileObject,
            $genericUseCaseRequestDTOFileObject
        );
    }

    public function setGenericUseCaseRequestBuilderImplSkeletonModelAssembler(
        GenericUseCaseRequestBuilderImplSkeletonModelAssembler $genericUseCaseRequestBuilderImplSkeletonModelAssembler
    ): void {
        $this->genericUseCaseRequestBuilderImplSkeletonModelAssembler = $genericUseCaseRequestBuilderImplSkeletonModelAssembler;
    }
}
