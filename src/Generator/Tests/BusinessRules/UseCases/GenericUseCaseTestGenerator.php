<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\GenericUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GenericUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GenericUseCaseTestSkeletonModelAssembler;

class GenericUseCaseTestGenerator extends AbstractUseCaseGenerator
{
    private GenericUseCaseTestSkeletonModelAssembler $genericUseCaseTestSkeletonModelAssembler;

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
        $genericUseCaseFileObject = $this->createGenericUseCaseFileObject($domain, $useCaseName);
        $genericUseCaseTestFileObject = $this->createGenericUseCaseTestFileObject($domain, $useCaseName);
        $genericUseCaseRequestFileObject = $this->createGenericUseCaseRequestFileObject($domain, $useCaseName);

        $genericUseCaseTestFileObject->setContent(
            $this->generateContent(
                $genericUseCaseTestFileObject,
                $genericUseCaseRequestFileObject,
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

    private function createGenericUseCaseRequestFileObject(string $domain, string $useCaseName): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST,
            $domain,
            $useCaseName
        );
    }

    private function generateContent(
        FileObject $genericUseCaseTestFileObject,
        FileObject $genericUseCaseRequestFileObject,
        FileObject $genericUseCaseFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $genericUseCaseTestFileObject,
            $genericUseCaseRequestFileObject,
            $genericUseCaseFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $genericUseCaseTestFileObject,
        FileObject $genericUseCaseRequestFileObject,
        FileObject $genericUseCaseFileObject
    ): GenericUseCaseTestSkeletonModel {
        return $this->genericUseCaseTestSkeletonModelAssembler->create(
            $genericUseCaseTestFileObject,
            $genericUseCaseRequestFileObject,
            $genericUseCaseFileObject
        );
    }

    public function setGenericUseCaseTestSkeletonModelAssembler(
        GenericUseCaseTestSkeletonModelAssembler $genericUseCaseTestSkeletonModelAssembler
    ): void {
        $this->genericUseCaseTestSkeletonModelAssembler = $genericUseCaseTestSkeletonModelAssembler;
    }
}
