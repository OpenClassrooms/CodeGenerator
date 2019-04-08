<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Entities\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\EntityStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Entities\EntityStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Entities\EntityStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EntityStubGenerator extends AbstractGenerator
{
    /**
     * @var EntityFileObjectFactory
     */
    private $entityFileObjectFactory;

    /**
     * @var EntityStubSkeletonModelAssembler
     */
    private $entityStubSkeletonModelAssembler;

    /**
     * @param EntityStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($generatorRequest->getUseCaseResponseClassName());
        $entityStubFileObject = $this->buildEntityStubFileObject($entityFileObject);

        $this->insertFileObject($entityStubFileObject);

        return $entityStubFileObject;
    }

    private function createEntityFileObject(string $useCaseResponseClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $useCaseResponseClassName
        );

        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function buildEntityStubFileObject(FileObject $entityFileObject): FileObject
    {
        $entityStubFileObject = $this->createEntityStubFileObject($entityFileObject);
        $entityImplFileObject = $this->createEntityImplFileObject($entityFileObject);
        $entityStubFileObject->setFields($this->generateFields($entityFileObject, $entityStubFileObject));
        $entityStubFileObject->setConsts($this->generateConsts($entityStubFileObject));
        $entityStubFileObject->setContent(
            $this->generateContent($entityImplFileObject, $entityStubFileObject)
        );

        return $entityStubFileObject;
    }

    private function createEntityStubFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function createEntityImplFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_IMPL,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function generateFields(FileObject $fileObject, FileObject $stubFieldObject): array
    {
        $entityFields = $this->getProtectedClassFields($fileObject->getClassName());

        return FieldUtility::generateStubFieldObjects($entityFields, $stubFieldObject);
    }

    /**
     * @return ConstObject[]
     */
    private function generateConsts(FileObject $entityStubFileObject): array
    {
        /** @var ConstObject[] $consts */
        $consts = [];
        foreach ($entityStubFileObject->getFields() as $field) {
            $value = $field->getValue();
            if ($value instanceof ConstObject) {
                $consts[] = $value;
            }
        }

        return $consts;
    }

    private function generateContent(FileObject $entityImplFileObject, FileObject $entityStubFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($entityImplFileObject, $entityStubFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityImplFileObject,
        FileObject $entityStubFileObject
    ): EntityStubSkeletonModel
    {
        return $this->entityStubSkeletonModelAssembler->create($entityImplFileObject, $entityStubFileObject);
    }

    public function setEntityStubSkeletonModelAssembler(
        EntityStubSkeletonModelAssembler $entityStubSkeletonModelAssembler
    ): void
    {
        $this->entityStubSkeletonModelAssembler = $entityStubSkeletonModelAssembler;
    }

    public function setEntityFileObjectFactory(EntityFileObjectFactory $entityFileObjectFactory): void
    {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
    }
}
