<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseResponseTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;

class UseCaseResponseTestCaseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseResponseTestCaseSkeletonModelAssembler
     */
    private $useCaseResponseTestCaseSkeletonModelAssembler;

    /**
     * @param string[] $wantedFields
     */
    private function buildUseCaseResponseTestCaseFileObject(
        string $entityClassName,
        array $wantedFields = []
    ): FileObject {
        $this->initFileObjectParameter($entityClassName);

        $useCaseResponseTestCaseFileObject = $this->createUseCaseResponseTestCaseFileObject();
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject();

        $fields = FieldUtility::getFields($entityClassName, $wantedFields);
        $useCaseResponseFileObject->setMethods($this->getSelectedAccessors($entityClassName, $fields));

        $useCaseResponseTestCaseFileObject->setContent(
            $this->generateContent(
                $useCaseResponseTestCaseFileObject,
                $useCaseResponseFileObject
            )
        );

        return $useCaseResponseTestCaseFileObject;
    }

    private function createSkeletonModel(
        FileObject $useCaseResponseTestCaseFileObject,
        FileObject $useCaseResponseFileObject
    ): UseCaseResponseTestCaseSkeletonModel {
        return $this->useCaseResponseTestCaseSkeletonModelAssembler->create(
            $useCaseResponseTestCaseFileObject,
            $useCaseResponseFileObject
        );
    }

    private function createUseCaseResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $this->domain,
            $this->entity
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

    /**
     * @param UseCaseResponseTestCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseResponseTestCaseFileObject = $this->buildUseCaseResponseTestCaseFileObject(
            $generatorRequest->getEntityClassName(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseResponseTestCaseFileObject);

        return $useCaseResponseTestCaseFileObject;
    }

    private function generateContent(
        FileObject $useCaseResponseTestCaseFileObject,
        FileObject $useCaseResponseFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseResponseTestCaseFileObject,
            $useCaseResponseFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    public function setUseCaseResponseTestCaseSkeletonModelAssembler(
        UseCaseResponseTestCaseSkeletonModelAssembler $useCaseResponseTestCaseSkeletonModelAssembler
    ): void {
        $this->useCaseResponseTestCaseSkeletonModelAssembler = $useCaseResponseTestCaseSkeletonModelAssembler;
    }
}
