<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class CreateEntityRequestGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var CreateEntityRequestSkeletonModelAssembler
     */
    private $createEntityRequestSkeletonModelAssembler;

    /**
     * @param CreateEntityRequestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityRequestFileObject = $this->buildCreateEntityRequestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityRequestFileObject);

        return $createEntityRequestFileObject;
    }

    private function buildCreateEntityRequestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityRequestFileObject = $this->createCreateEntityRequestFileObject();
        $createEntityRequestFileObject->setMethods(
            $this->getAccessorsWithoutId($entityClassName)
        );

        $createEntityRequestFileObject->setContent($this->generateContent($createEntityRequestFileObject));

        return $createEntityRequestFileObject;
    }

    private function createCreateEntityRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    /**
     * @param string[] $fields
     */
    public static function getAccessorsWithoutId(string $className): array
    {
        $accessors = MethodUtility::getAccessors($className);

        foreach ($accessors as $key => $accessor) {
            if ($accessor->getName() === 'getId') {
                unset($accessors[$key]);
            }
        }

        return $accessors;
    }

    private function generateContent(FileObject $createEntityRequestFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($createEntityRequestFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(FileObject $createEntityRequestFileObject): CreateEntityRequestSkeletonModel
    {
        return $this->createEntityRequestSkeletonModelAssembler->create($createEntityRequestFileObject);
    }

    public function setCreateEntityRequestSkeletonModelAssembler(
        CreateEntityRequestSkeletonModelAssembler $createEntityRequestSkeletonModelAssembler
    ): void {
        $this->createEntityRequestSkeletonModelAssembler = $createEntityRequestSkeletonModelAssembler;
    }
}
