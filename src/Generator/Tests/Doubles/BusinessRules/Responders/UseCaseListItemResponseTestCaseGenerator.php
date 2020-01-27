<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseSkeletonModelAssembler;

class UseCaseListItemResponseTestCaseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseListItemResponseTestCaseSkeletonModelAssembler
     */
    private $useCaseListItemResponseTestCaseSkeletonModelAssembler;

    /**
     * @param UseCaseListItemResponseTestCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseListItemResponseTestCaseFileObject = $this->buildUseCaseListItemResponseTestCaseFileObject(
            $generatorRequest->getEntityClassName(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseListItemResponseTestCaseFileObject);

        return $useCaseListItemResponseTestCaseFileObject;
    }

    /**
     * @param string[] $wantedFields
     */
    private function buildUseCaseListItemResponseTestCaseFileObject(
        string $entityClassName,
        array $wantedFields = []
    ): FileObject {
        $this->initFileObjectParameter($entityClassName);
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject();
        $useCaseListItemResponseTestCaseFileObject = $this->createUseCaseListItemResponseTestCaseFileObject();
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject();
        $useCaseResponseTestCaseFileObject = $this->createUseCaseResponseTestCaseFileObject();

        $useCaseListItemResponseFileObject->setMethods($this->getSelectedAccessors($entityClassName, $wantedFields));

        $useCaseListItemResponseTestCaseFileObject->setContent(
            $this->generateContent(
                $useCaseListItemResponseFileObject,
                $useCaseListItemResponseTestCaseFileObject,
                $useCaseResponseFileObject,
                $useCaseResponseTestCaseFileObject
            )
        );

        return $useCaseListItemResponseTestCaseFileObject;
    }

    private function createUseCaseListItemResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseListItemResponseTestCaseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_TEST_CASE,
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
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseListItemResponseTestCaseFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseTestCaseFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseListItemResponseFileObject,
            $useCaseListItemResponseTestCaseFileObject,
            $useCaseResponseFileObject,
            $useCaseResponseTestCaseFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseListItemResponseTestCaseFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseTestCaseFileObject
    ): UseCaseListItemResponseTestCaseSkeletonModel {
        return $this->useCaseListItemResponseTestCaseSkeletonModelAssembler->create(
            $useCaseListItemResponseFileObject,
            $useCaseListItemResponseTestCaseFileObject,
            $useCaseResponseFileObject,
            $useCaseResponseTestCaseFileObject
        );
    }

    public function setUseCaseListItemResponseTestCaseSkeletonModelAssembler(
        UseCaseListItemResponseTestCaseSkeletonModelAssembler $useCaseListItemResponseTestCaseSkeletonModelAssembler
    ): void {
        $this->useCaseListItemResponseTestCaseSkeletonModelAssembler = $useCaseListItemResponseTestCaseSkeletonModelAssembler;
    }
}
