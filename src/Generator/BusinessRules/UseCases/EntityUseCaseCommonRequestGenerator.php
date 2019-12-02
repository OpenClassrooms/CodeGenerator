<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityUseCaseCommonRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EntityUseCaseCommonRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EntityUseCaseCommonRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtilityStrategy;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

class EntityUseCaseCommonRequestGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var EntityUseCaseCommonRequestSkeletonModelAssembler
     */
    private $entityUseCaseCommonRequestSkeletonModelAssembler;

    /**
     * @param EntityUseCaseCommonRequestGeneratorRequest $generatorRequest
     */

    /**
     * @var FieldObjectUtilityStrategy
     */
    private $fieldUtility;

    /**
     * @var MethodUtilityStrategy
     */
    private $methodUtility;

    private function buildEntityUseCaseCommonRequestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityUseCaseCommonRequestFileObject = $this->createEntityUseCaseCommonRequestFileObject();

        $entityUseCaseCommonRequestFileObject->setFields($this->fieldUtility->getFields($entityClassName));
        $entityUseCaseCommonRequestFileObject->setMethods($this->methodUtility->getAccessors($entityClassName));

        $entityUseCaseCommonRequestFileObject->setContent(
            $this->generateContent($entityUseCaseCommonRequestFileObject)
        );

        return $entityUseCaseCommonRequestFileObject;
    }

    private function createEntityUseCaseCommonRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_ENTITY_USE_CASE_COMMON_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function createSkeletonModel(
        FileObject $entityUseCaseCommonRequestFileObject
    ): EntityUseCaseCommonRequestSkeletonModel {
        return $this->entityUseCaseCommonRequestSkeletonModelAssembler->create($entityUseCaseCommonRequestFileObject);
    }

    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $entityUseCaseCommonRequestFileObject = $this->buildEntityUseCaseCommonRequestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($entityUseCaseCommonRequestFileObject);

        return $entityUseCaseCommonRequestFileObject;
    }

    private function generateContent(FileObject $entityUseCaseCommonRequestFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($entityUseCaseCommonRequestFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    public function setEntityUseCaseCommonRequestSkeletonModelAssembler(
        EntityUseCaseCommonRequestSkeletonModelAssembler $entityUseCaseCommonRequestSkeletonModelAssembler
    ): void {
        $this->entityUseCaseCommonRequestSkeletonModelAssembler = $entityUseCaseCommonRequestSkeletonModelAssembler;
    }

    public function setFieldUtility(FieldObjectUtilityStrategy $fieldUtility): void
    {
        $this->fieldUtility = $fieldUtility;
    }

    public function setMethodUtility(MethodUtilityStrategy $methodUtility): void
    {
        $this->methodUtility = $methodUtility;
    }
}
