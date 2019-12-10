<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseSkeletonModelBuilder;

class GetEntityUseCaseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntityUseCaseSkeletonModelBuilder
     */
    private $skeletonModelBuilder;

    /**
     * @param GetEntityUseCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityUseCaseFileObject = $this->buildGetEntityUseCaseFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntityUseCaseFileObject);

        return $getEntityUseCaseFileObject;
    }

    private function buildGetEntityUseCaseFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityFileObject = $this->createEntityFileObject();
        $entityGatewayFileObject = $this->createEntityGatewayFileObject();
        $getEntityUseCaseRequestFileObject = $this->createGetEntityUseCaseRequestFileObject();
        $getEntityUseCaseDetailResponseFileObject = $this->createGetEntityUseCaseDetailResponseFileObject();
        $getEntityUseCaseDetailResponseAssemblerFileObject = $this->createGetEntityUseCaseDetailResponseAssemblerFileObject(
        );
        $getEntityUseCaseResponseFileObject = $this->createGetEntityUseCaseResponseFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();

        $getEntityUseCaseFileObject = $this->createGetEntityUseCaseFileObject();

        $getEntityUseCaseFileObject->setContent(
            $this->generateContent(
                [
                    EntityFileObjectType::BUSINESS_RULES_ENTITY                                      => $entityFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY                              => $entityGatewayFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION                  => $entityNotFoundExceptionFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_USE_CASE                                   => $getEntityUseCaseFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST                    => $getEntityUseCaseRequestFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE           => $getEntityUseCaseDetailResponseFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER => $getEntityUseCaseDetailResponseAssemblerFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE                  => $getEntityUseCaseResponseFileObject,
                ]
            )
        );

        return $getEntityUseCaseFileObject;
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

    private function createGetEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createGetEntityUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createGetEntityUseCaseDetailResponseAssemblerFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createGetEntityUseCaseResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createEntityNotFoundExceptionFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createGetEntityUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    /**
     * @param FileObject[]
     */
    private function generateContent(
        array $fileObjects
    ): string {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    /**
     * @param FileObject[]
     */
    private function createSkeletonModel(
        array $fileObjects
    ): GetEntityUseCaseSkeletonModel {
        return $this->skeletonModelBuilder->create()
            ->withEntityClassName(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY]
            )
            ->withEntityClassNameDetailResponse(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE]
            )
            ->withEntityClassNameDetailResponseAssembler(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER]
            )
            ->withEntityClassNameGateway($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY])
            ->withEntityClassNameNotFoundException(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION]
            )
            ->withEntityClassNameResponse($fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE])
            ->withGetEntityUseCase($fileObjects[UseCaseFileObjectType::BUSINESS_RULES_USE_CASE])
            ->withGetEntityUseCaseRequest($fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST])
            ->build();
    }

    public function setGetEntityUseCaseSkeletonModelBuilder(
        GetEntityUseCaseSkeletonModelBuilder $skeletonModelBuilder
    ): void {
        $this->skeletonModelBuilder = $skeletonModelBuilder;
    }
}
