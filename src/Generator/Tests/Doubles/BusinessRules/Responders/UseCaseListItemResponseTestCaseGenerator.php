<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
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
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseListItemResponseTestCaseFileObject);

        return $useCaseListItemResponseTestCaseFileObject;
    }

    /**
     * @param string[] $fields
     */
    private function buildUseCaseListItemResponseTestCaseFileObject(string $entityClassName, array $fields): FileObject
    {
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject($entityClassName);
        $useCaseListItemResponseTestCaseFileObject = $this->createUseCaseListItemResponseTestCaseFileObject(
            $useCaseListItemResponseFileObject
        );
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject($useCaseListItemResponseFileObject);
        $useCaseResponseTestCaseFileObject = $this->createUseCaseResponseTestCaseFileObject(
            $useCaseListItemResponseFileObject
        );

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

    private function createUseCaseListItemResponseFileObject(string $entityClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createUseCaseListItemResponseTestCaseFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_TEST_CASE,
            $fileObject->getDomain(),
            $fileObject->getEntity(),
            $fileObject->getBaseNamespace()
        );
    }

    private function createUseCaseResponseFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $fileObject->getDomain(),
            $fileObject->getEntity(),
            $fileObject->getBaseNamespace()
        );
    }

    private function createUseCaseResponseTestCaseFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_TEST_CASE,
            $fileObject->getDomain(),
            $fileObject->getEntity(),
            $fileObject->getBaseNamespace()
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
