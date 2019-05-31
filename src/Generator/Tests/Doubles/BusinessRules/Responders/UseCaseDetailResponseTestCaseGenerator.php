<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
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
            $generatorRequest->getEntity(),
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
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject($entityClassName);
        $useCaseDetailResponseTestCaseFileObject = $this->createUseCaseDetailResponseTestCaseFileObject(
            $useCaseDetailResponseFileObject
        );
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject($useCaseDetailResponseFileObject);
        $useCaseResponseTestCaseFileObject = $this->createUseCaseResponseTestCaseFileObject(
            $useCaseDetailResponseFileObject
        );

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

    private function createUseCaseDetailResponseFileObject(string $entityClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createUseCaseDetailResponseTestCaseFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_TEST_CASE,
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
