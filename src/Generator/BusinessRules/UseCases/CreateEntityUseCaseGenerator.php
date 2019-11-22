<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

class CreateEntityUseCaseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var CreateEntityUseCaseSkeletonModelBuilder
     */
    private $createEntitySkeletonModelBuilder;

    /**
     * @var MethodUtilityStrategy
     */
    private $methodUtility;

    /**
     * @param CreateEntityUseCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityFileObject = $this->buildCreateEntityUseCaseFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityFileObject);

        return $createEntityFileObject;
    }

    public function setCreateEntityUseCaseSkeletonModelBuilder(
        CreateEntityUseCaseSkeletonModelBuilder $createEntitySkeletonModelBuilder
    ): void {
        $this->createEntitySkeletonModelBuilder = $createEntitySkeletonModelBuilder;
    }

    public function setMethodUtility(MethodUtilityStrategy $methodUtility): void
    {
        $this->methodUtility = $methodUtility;
    }

    private function buildCreateEntityUseCaseFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityFileObject = $this->createCreateEntityUseCaseFileObject();
        $createEntityRequestFileObject = $this->createCreateEntityUseCaseRequestFileObject();
        $entityFileObject = $this->createEntityFileObject();
        $entityUseCaseDetailResponseFileObject = $this->createEntityDetailResponseFileObject();
        $entityUseCaseDetailResponseAssemblerFileObject = $this->createEntityDetailResponseAssemblerFileObject();
        $entityFactoryFileObject = $this->createEntityFactoryFileObject();
        $entityGatewayFileObject = $this->createEntityGatewayFileObject();

        $createEntityRequestFileObject->setMethods($this->methodUtility->getAccessors($entityClassName));

        $createEntityFileObject->setContent(
            $this->generateContent(
                [
                    UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE                     => $createEntityFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST      => $createEntityRequestFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY                                      => $entityFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE           => $entityUseCaseDetailResponseFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER => $entityUseCaseDetailResponseAssemblerFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_FACTORY                              => $entityFactoryFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY                              => $entityGatewayFileObject,
                ]
            )
        );

        return $createEntityFileObject;
    }

    private function createCreateEntityUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function createCreateEntityUseCaseRequestFileObject()
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityDetailResponseAssemblerFileObject()
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityDetailResponseFileObject()
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityFactoryFileObject()
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_FACTORY,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityFileObject()
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityGatewayFileObject()
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY,
            $this->domain,
            $this->entity
        );
    }

    private function createSkeletonModel(array $fileObjects): CreateEntityUseCaseSkeletonModel
    {
        return $this->createEntitySkeletonModelBuilder->create()
            ->withCreateEntityUseCaseFileObject(
                $fileObjects[UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE]
            )
            ->withCreateEntityUseCaseRequest(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST]
            )
            ->withEntity($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY])
            ->withEntityDetailResponse(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE]
            )
            ->withEntityDetailResponseAssembler(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER]
            )
            ->withEntityFactory($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_FACTORY])
            ->withEntityGateway($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY])
            ->build();
    }

    /**
     * @param FileObject[] $fileObjects
     */
    private function generateContent(array $fileObjects): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }
}
