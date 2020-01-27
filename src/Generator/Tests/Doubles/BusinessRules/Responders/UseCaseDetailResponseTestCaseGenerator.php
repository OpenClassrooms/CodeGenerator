<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseSkeletonModelAssembler;

class UseCaseDetailResponseTestCaseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseDetailResponseTestCaseSkeletonModelAssembler
     */
    private $useCaseDetailResponseTestCaseSkeletonModelAssembler;

    /**
     * @param UseCaseDetailResponseTestCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseDetailResponseTestCaseFileObject = $this->buildUseCaseDetailResponseTestCaseFileObject(
            $generatorRequest->getEntityClassName(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseDetailResponseTestCaseFileObject);

        return $useCaseDetailResponseTestCaseFileObject;
    }

    /**
     * @param string[] $wantedFields
     */
    private function buildUseCaseDetailResponseTestCaseFileObject(
        string $entityClassName,
        array $wantedFields = []
    ): FileObject {
        $this->initFileObjectParameter($entityClassName);
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject();
        $useCaseDetailResponseTestCaseFileObject = $this->createUseCaseDetailResponseTestCaseFileObject();
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject();
        $useCaseResponseTestCaseFileObject = $this->createUseCaseResponseTestCaseFileObject();

        $useCaseDetailResponseFileObject->setMethods($this->getSelectedAccessors($entityClassName, $wantedFields));

        $useCaseDetailResponseTestCaseFileObject->setContent(
            $this->generateContent(
                $useCaseDetailResponseFileObject,
                $useCaseDetailResponseTestCaseFileObject,
                $useCaseResponseFileObject,
                $useCaseResponseTestCaseFileObject
            )
        );

        return $useCaseDetailResponseTestCaseFileObject;
    }

    private function createUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseDetailResponseTestCaseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_TEST_CASE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseResponseTestCaseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_TEST_CASE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseDetailResponseTestCaseFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseTestCaseFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseDetailResponseFileObject,
            $useCaseDetailResponseTestCaseFileObject,
            $useCaseResponseFileObject,
            $useCaseResponseTestCaseFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseDetailResponseTestCaseFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseTestCaseFileObject
    ): UseCaseDetailResponseTestCaseSkeletonModel {
        return $this->useCaseDetailResponseTestCaseSkeletonModelAssembler->create(
            $useCaseDetailResponseFileObject,
            $useCaseDetailResponseTestCaseFileObject,
            $useCaseResponseFileObject,
            $useCaseResponseTestCaseFileObject
        );
    }

    public function setUseCaseDetailResponseTestCaseSkeletonModelAssembler(
        UseCaseDetailResponseTestCaseSkeletonModelAssembler $useCaseDetailResponseTestCaseSkeletonModelAssembler
    ): void {
        $this->useCaseDetailResponseTestCaseSkeletonModelAssembler = $useCaseDetailResponseTestCaseSkeletonModelAssembler;
    }
}
