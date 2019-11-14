<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntitiesUseCaseSkeletonModelAssembler
     */
    private $getEntitiesUseCaseSkeletonModelAssembler;

    /**
     * @param GetEntitiesUseCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntitiesUseCaseFileObject = $this->buildGetEntitiesUseCaseFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntitiesUseCaseFileObject);

        return $getEntitiesUseCaseFileObject;
    }

    private function buildGetEntitiesUseCaseFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityFileObject = $this->createEntityFileObject();
        $entityGatewayFileObject = $this->createEntityGatewayFileObject();
        $getEntitiesUseCaseFileObject = $this->createGetEntitiesUseCaseFileObject();
        $getEntitiesUseCaseListItemResponseAssemblerFileObject = $this->createGetEntityUseCaseListItemResponseAssemblerFileObject(
        );
        $getEntitiesUseCaseRequestFileObject = $this->createGetEntitiesUseCaseRequestFileObject();

        $getEntitiesUseCaseFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $entityGatewayFileObject,
                $getEntitiesUseCaseFileObject,
                $getEntitiesUseCaseListItemResponseAssemblerFileObject,
                $getEntitiesUseCaseRequestFileObject
            )
        );

        return $getEntitiesUseCaseFileObject;
    }

    private function createEntityFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createEntityGatewayFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createGetEntitiesUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createGetEntityUseCaseListItemResponseAssemblerFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createGetEntitiesUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $getEntitiesUseCaseFileObject,
        FileObject $getEntitiesUseCaseListItemResponseAssemblerFileObject,
        FileObject $getEntitiesUseCaseRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $entityGatewayFileObject,
            $getEntitiesUseCaseFileObject,
            $getEntitiesUseCaseListItemResponseAssemblerFileObject,
            $getEntitiesUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $getEntitiesUseCaseFileObject,
        FileObject $getEntitiesUseCaseListItemResponseAssemblerFileObject,
        FileObject $getEntitiesUseCaseRequestFileObject
    ): GetEntitiesUseCaseSkeletonModel {
        return $this->getEntitiesUseCaseSkeletonModelAssembler->create(
            $entityFileObject,
            $entityGatewayFileObject,
            $getEntitiesUseCaseFileObject,
            $getEntitiesUseCaseListItemResponseAssemblerFileObject,
            $getEntitiesUseCaseRequestFileObject
        );
    }

    public function setGetEntitiesUseCaseSkeletonModelAssembler(
        GetEntitiesUseCaseSkeletonModelAssembler $getEntitiesUseCaseSkeletonModelAssembler
    ): void {
        $this->getEntitiesUseCaseSkeletonModelAssembler = $getEntitiesUseCaseSkeletonModelAssembler;
    }
}
