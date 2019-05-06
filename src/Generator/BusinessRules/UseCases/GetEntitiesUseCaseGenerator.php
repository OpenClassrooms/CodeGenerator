<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

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
            $generatorRequest->getEntity()
        );

        $this->insertFileObject($getEntitiesUseCaseFileObject);

        return $getEntitiesUseCaseFileObject;
    }

    private function buildGetEntitiesUseCaseFileObject(string $entityClassName): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $entityGatewayFileObject = $this->createEntityGatewayFileObject(
            $entityFileObject
        );
        $getEntitiesUseCaseFileObject = $this->createGetEntitiesUseCaseFileObject($entityFileObject);
        $getEntitiesUseCaseListItemResponseAssemblerFileObject = $this->createGetEntityUseCaseListItemResponseAssemblerFileObject(
            $entityFileObject
        );
        $getEntitiesUseCaseRequestFileObject = $this->createGetEntitiesUseCaseRequestFileObject(
            $entityFileObject
        );

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

    private function createEntityFileObject(string $entityClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createEntityGatewayFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function createGetEntitiesUseCaseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function createGetEntityUseCaseListItemResponseAssemblerFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function createGetEntitiesUseCaseRequestFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $getEntitiesUseCaseFileObject,
        FileObject $getEntitiesUseCaseListItemResponseAssemblerFileObject,
        FileObject $getEntitiesUseCaseRequestFileObject
    ): string
    {
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
    ): GetEntitiesUseCaseSkeletonModel
    {
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
    ): void
    {
        $this->getEntitiesUseCaseSkeletonModelAssembler = $getEntitiesUseCaseSkeletonModelAssembler;
    }
}
