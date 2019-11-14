<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityUseCaseRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class CreateEntityUseCaseRequestBuilderGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var CreateEntityUseCaseRequestBuilderSkeletonModelAssembler
     */
    private $createEntityRequestBuilderSkeletonModelAssembler;

    /**
     * @param CreateEntityUseCaseRequestBuilderGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityRequestBuilderFileObject = $this->buildCreateEntityUseCaseRequestBuilderFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityRequestBuilderFileObject);

        return $createEntityRequestBuilderFileObject;
    }

    private function buildCreateEntityUseCaseRequestBuilderFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityRequestBuilderFileObject = $this->createCreateEntityUseCaseRequestBuilderFileObject();
        $createEntityRequestFileObject = $this->createCreateEntityUseCaseRequestFileObject();

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

    private function createCreateEntityUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER,
            $this->domain,
            $this->entity
        );
    }

    private function createCreateEntityUseCaseRequestFileObject(): FileObject
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
    ): CreateEntityUseCaseRequestBuilderSkeletonModel {
        return $this->createEntityRequestBuilderSkeletonModelAssembler->create(
            $createEntityRequestBuilderFileObject,
            $createEntityRequestFileObject
        );
    }

    public function setCreateEntityUseCaseRequestBuilderSkeletonModelAssembler(
        CreateEntityUseCaseRequestBuilderSkeletonModelAssembler $createEntityRequestBuilderSkeletonModelAssembler
    ): void {
        $this->createEntityRequestBuilderSkeletonModelAssembler = $createEntityRequestBuilderSkeletonModelAssembler;
    }
}
