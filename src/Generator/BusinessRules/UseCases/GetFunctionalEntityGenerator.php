<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractGenericUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetFunctionalEntityGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetFunctionalEntitySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetFunctionalEntitySkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetFunctionalEntityGenerator extends AbstractGenericUseCaseGenerator
{
    /**
     * @var EntityFileObjectFactory
     */
    private $entityFileObjectFactory;

    /**
     * @var GetFunctionalEntitySkeletonModelBuilder
     */
    private $skeletonModelBuilder;

    /**
     * @param GetFunctionalEntityGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityFileObject = $this->buildGetEntityFileObject(
            $generatorRequest->getEntity()
        );

        $this->insertFileObject($getEntityFileObject);

        return $getEntityFileObject;
    }

    private function buildGetEntityFileObject(string $entityClassName): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $entityGatewayFileObject = $this->createEntityGatewayFileObject(
            $entityFileObject
        );
        $getEntityRequestFileObject = $this->createEntityRequestFileObject(
            $entityFileObject
        );
        $entityDetailResponseAssemblerFileObject = $this->createEntityDetailResponseAssemblerFileObject(
            $entityFileObject
        );
        $entityResponseFileObject = $this->createEntityResponseFileObject(
            $entityFileObject
        );
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject(
            $entityFileObject
        );

        $getEntityRequestFileObject->setMethods(
            MethodUtility::getAccessors($getEntityRequestFileObject->getClassName())
        );

        $getEntityFileObject = $this->createGetEntityFileObject($entityFileObject);

        $getEntityFileObject->setContent(
            $this->generateContent(
                [
                    EntityFileObjectType::BUSINESS_RULES_ENTITY                                      => $entityFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY                              => $entityGatewayFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION                  => $entityNotFoundExceptionFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY                                 => $getEntityFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_REQUEST                  => $getEntityRequestFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER => $entityDetailResponseAssemblerFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE                  => $entityResponseFileObject,
                ]
            )
        );

        return $getEntityFileObject;
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

    private function createEntityRequestFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_REQUEST,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function createEntityDetailResponseAssemblerFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function createEntityResponseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function createEntityNotFoundExceptionFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function createGetEntityFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    /**
     * @param FileObject[]
     */
    private function generateContent(array $fileObjects): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    /**
     * @param FileObject[]
     */
    private function createSkeletonModel(array $fileObjects): GetFunctionalEntitySkeletonModel
    {
        return $this->skeletonModelBuilder->create()
            ->withEntity(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY]
            )
            ->withEntityGateway($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY])
            ->withGetEntity($fileObjects[UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY])
            ->withGetEntityRequest($fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_REQUEST])
            ->withEntityDetailResponseAssembler(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER]
            )
            ->withEntityResponse($fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE])
            ->withEntityNotFoundException(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION]
            )
            ->build();
    }

    public function setGetFunctionalEntitySkeletonModelBuilder(
        GetFunctionalEntitySkeletonModelBuilder $skeletonModelBuilder
    ): void
    {
        $this->skeletonModelBuilder = $skeletonModelBuilder;
    }

    public function setEntityFileObjectFactory(EntityFileObjectFactory $entityFileObjectFactory): void
    {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
    }
}
