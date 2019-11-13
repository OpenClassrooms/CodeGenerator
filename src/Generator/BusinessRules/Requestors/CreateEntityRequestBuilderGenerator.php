<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class CreateEntityRequestBuilderGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var CreateEntityRequestBuilderSkeletonModelAssembler
     */
    private $createEntityRequestBuilderSkeletonModelAssembler;

    /**
     * @param CreateEntityRequestBuilderGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityRequestBuilderFileObject = $this->buildCreateEntityRequestBuilderFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityRequestBuilderFileObject);

        return $createEntityRequestBuilderFileObject;
    }

    private function buildCreateEntityRequestBuilderFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityRequestBuilderFileObject = $this->createCreateEntityRequestBuilderFileObject();
        $createEntityRequestFileObject = $this->createCreateEntityRequestFileObject();

        $createEntityRequestBuilderFileObject->setMethods(
            MethodUtility::buildWitherMethods($entityClassName, $createEntityRequestBuilderFileObject->getShortName())
        );

        $createEntityRequestBuilderFileObject->setContent(
            $this->generateContent(
                $createEntityRequestBuilderFileObject,
                $createEntityRequestFileObject
            )
        );

        return $createEntityRequestBuilderFileObject;
    }

    private function createCreateEntityRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER,
            $this->domain,
            $this->entity
        );
    }

    private function createCreateEntityRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $createEntityRequestBuilderFileObject,
        FileObject $createEntityRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $createEntityRequestBuilderFileObject,
            $createEntityRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $createEntityRequestBuilderFileObject,
        FileObject $createEntityRequestFileObject
    ): CreateEntityRequestBuilderSkeletonModel {
        return $this->createEntityRequestBuilderSkeletonModelAssembler->create(
            $createEntityRequestBuilderFileObject,
            $createEntityRequestFileObject
        );
    }

    public function setCreateEntityRequestBuilderSkeletonModelAssembler(
        CreateEntityRequestBuilderSkeletonModelAssembler $createEntityRequestBuilderSkeletonModelAssembler
    ): void {
        $this->createEntityRequestBuilderSkeletonModelAssembler = $createEntityRequestBuilderSkeletonModelAssembler;
    }
}
