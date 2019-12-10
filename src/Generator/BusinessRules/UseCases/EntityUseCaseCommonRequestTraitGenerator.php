<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityUseCaseCommonRequestTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EntityUseCaseCommonRequestTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EntityUseCaseCommonRequestTraitSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtilityStrategy;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

class EntityUseCaseCommonRequestTraitGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var EntityUseCaseCommonRequestTraitSkeletonModelAssembler
     */
    private $entityUseCaseCommonRequestSkeletonModelAssembler;

    /**
     * @param EntityUseCaseCommonRequestTraitGeneratorRequest $generatorRequest
     */

    /**
     * @var FieldObjectUtilityStrategy
     */
    private $fieldUtility;

    /**
     * @var MethodUtilityStrategy
     */
    private $methodUtility;

    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $entityUseCaseCommonRequestFileObject = $this->buildEntityUseCaseCommonRequestTraitFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($entityUseCaseCommonRequestFileObject);

        return $entityUseCaseCommonRequestFileObject;
    }

    private function buildEntityUseCaseCommonRequestTraitFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityUseCaseCommonRequestFileObject = $this->createEntityUseCaseCommonRequestTraitFileObject();

        $entityUseCaseCommonRequestFileObject->setFields($this->fieldUtility->getFields($entityClassName));
        $entityUseCaseCommonRequestFileObject->setMethods($this->methodUtility->getAccessors($entityClassName));

        $entityUseCaseCommonRequestFileObject->setContent(
            $this->generateContent($entityUseCaseCommonRequestFileObject)
        );

        return $entityUseCaseCommonRequestFileObject;
    }

    private function createEntityUseCaseCommonRequestTraitFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_ENTITY_USE_CASE_COMMON_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(FileObject $entityUseCaseCommonRequestFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($entityUseCaseCommonRequestFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityUseCaseCommonRequestFileObject
    ): EntityUseCaseCommonRequestTraitSkeletonModel {
        return $this->entityUseCaseCommonRequestSkeletonModelAssembler->create($entityUseCaseCommonRequestFileObject);
    }

    public function setEntityUseCaseCommonRequestTraitSkeletonModelAssembler(
        EntityUseCaseCommonRequestTraitSkeletonModelAssembler $entityUseCaseCommonRequestSkeletonModelAssembler
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
