<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ControllerFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\GetEntityControllerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\GetEntityControllerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\GetEntityControllerSkeletonModelBuilder;

class GetEntityControllerGenerator extends AbstractGenerator
{
    use CommonControllerFactoryTrait;

    /**
     * @var GetEntityControllerSkeletonModelBuilder
     */
    private $getEntityControllerSkeletonModelBuilder;

    /**
     * @param GetEntityControllerGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityControllerFileObject = $this->buildGetEntityControllerFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntityControllerFileObject);

        return $getEntityControllerFileObject;
    }

    private function buildGetEntityControllerFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $getEntityControllerFileObject = $this->createGetEntityControllerFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();
        $entityUseCaseDetailResponseFileObject = $this->createEntityUseCaseDetailResponseFileObject();
        $entityUseCaseResponseFileObject = $this->createEntityUseCaseResponseFileObject();
        $entityViewModelFileObject = $this->createEntityViewModelFileObject();
        $entityViewModelDetailAssemblerFileObject = $this->createEntityViewModelDetailAssemblerFileObject();
        $getEntityUseCaseFileObject = $this->createGetEntityUseCaseFileObject();
        $getEntityUseCaseRequestBuilderFileObject = $this->createGetEntityUseCaseRequestBuilderFileObject();

        $getEntityControllerFileObject->setContent(
            $this->generateContent(
                [
                    ControllerFileObjectType::API_CONTROLLER_GET_ENTITY                              => $getEntityControllerFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION                  => $entityNotFoundExceptionFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE           => $entityUseCaseDetailResponseFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE                  => $entityUseCaseResponseFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL                                          => $entityViewModelFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER                         => $entityViewModelDetailAssemblerFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE                        => $getEntityUseCaseFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER => $getEntityUseCaseRequestBuilderFileObject,
                ]
            )
        );

        return $getEntityControllerFileObject;
    }

    private function createGetEntityControllerFileObject(): FileObject
    {
        return $this->controllerFileObjectFactory->create(
            ControllerFileObjectType::API_CONTROLLER_GET_ENTITY,
            $this->entity
        );
    }

    public function createEntityNotFoundExceptionFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION,
            $this->domain,
            $this->entity
        );
    }

    public function createEntityUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    public function createEntityUseCaseResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    public function createEntityViewModelFileObject(): FileObject
    {
        return $this->viewModelFileObjectFactory->create(
            ViewModelFileObjectType::API_VIEW_MODEL,
            $this->domain,
            $this->entity
        );
    }

    public function createEntityViewModelDetailAssemblerFileObject(): FileObject
    {
        return $this->viewModelFileObjectFactory->create(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
            $this->domain,
            $this->entity
        );
    }

    public function createGetEntityUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    public function createGetEntityUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER,
            $this->domain,
            $this->entity
        );
    }

    /**
     * @param FileObject[] $fileObjects
     */
    private function generateContent(array $fileObjects): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    /**
     * @param FileObject[] $fileObjects
     */
    private function createSkeletonModel(array $fileObjects): GetEntityControllerSkeletonModel
    {
        return $this->getEntityControllerSkeletonModelBuilder
            ->create()
            ->createGetEntityControllerFileObject($fileObjects[ControllerFileObjectType::API_CONTROLLER_GET_ENTITY])
            ->createEntityNotFoundExceptionFileObject(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION]
            )
            ->createEntityUseCaseDetailResponseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE]
            )
            ->createEntityUseCaseResponseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE]
            )
            ->createEntityViewModelFileObject($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL])
            ->createEntityViewModelDetailAssemblerFileObject(
                $fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER]
            )
            ->createGetEntityUseCaseFileObject($fileObjects[UseCaseFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE])
            ->createGetEntityUseCaseRequestBuilderFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER]
            )
            ->build();
    }

    public function setGetEntityControllerSkeletonModelBuilder(
        GetEntityControllerSkeletonModelBuilder $getEntityControllerSkeletonModelBuilder
    ): void {
        $this->getEntityControllerSkeletonModelBuilder = $getEntityControllerSkeletonModelBuilder;
    }
}
