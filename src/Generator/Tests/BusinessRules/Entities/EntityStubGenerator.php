<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\FileObjects\ConstObject;
use OpenClassrooms\CodeGenerator\FileObjects\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\EntityStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Entities\EntityStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Entities\EntityStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;

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
        $entityImplFileObject = $this->createEntityImplFileObject($generatorRequest->getUseCaseResponseClassName());
        $entityStubFileObject = $this->buildEntityStubFileObject($entityImplFileObject);

        $this->insertFileObject($entityStubFileObject);

        return $entityStubFileObject;
    }

    private function createEntityImplFileObject(string $useCaseResponseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_IMPL,
            $domain,
            $entity
        );
    }

    private function buildEntityStubFileObject(FileObject $entityImplFileObject): FileObject
    {
        $entityStubFileObject = $this->createEntityFileObject($entityImplFileObject);
        $entityStubFileObject->setFields($this->generateFields($entityImplFileObject, $entityStubFileObject));
        $entityStubFileObject->setConsts($this->generateConsts($entityStubFileObject));
        $entityStubFileObject->setContent($this->generateContent($entityStubFileObject, $entityImplFileObject));

        return $entityStubFileObject;
    }

    private function createEntityFileObject(FileObject $entityImplFileObject): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $entityImplFileObject->getDomain(),
            $entityImplFileObject->getEntity()
        );
    }

    private function generateFields(FileObject $fileObject, FileObject $stubFieldObject): array
    {
        $entityFields = $this->getParentProtectedClassFields($fileObject->getClassName());

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

    private function generateContent(FileObject $entityStubFileObject, FileObject $entityImplFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($entityStubFileObject, $entityImplFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityStubFileObject,
        FileObject $entityImplFileObject
    ): EntityStubSkeletonModel
    {
        return $this->entityStubSkeletonModelAssembler->create($entityStubFileObject, $entityImplFileObject);
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
