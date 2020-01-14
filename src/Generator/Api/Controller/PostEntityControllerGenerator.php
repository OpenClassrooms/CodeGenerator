<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\ControllerFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\ModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ControllerFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ModelFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Controller\Request\PostEntityControllerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\PostEntityControllerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\PostEntityControllerSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class PostEntityControllerGenerator extends AbstractGenerator
{
    /**
     * @var PostEntityControllerSkeletonModelBuilder
     */
    private $postEntityControllerSkeletonModelBuilder;

    /**
     * @var ControllerFileObjectFactory
     */
    private $controllerFileObjectFactory;

    /**
     * @var EntityFileObjectFactory
     */
    private $entityFileObjectFactory;

    /**
     * @var ModelFileObjectFactory
     */
    private $modelFileObjectFactory;

    /**
     * @var UseCaseFileObjectFactory
     */
    private $useCaseFileObjectFactory;

    /**
     * @var UseCaseRequestFileObjectFactory
     */
    private $useCaseRequestFileObjectFactory;

    /**
     * @var UseCaseResponseFileObjectFactory
     */
    private $useCaseResponseFileObjectFactory;

    /**
     * @var ViewModelFileObjectFactory
     */
    private $viewModelFileObjectFactory;

    /**
     * @param PostEntityControllerGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $postEntityControllerFileObject = $this->buildPostEntityControllerFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($postEntityControllerFileObject);

        return $postEntityControllerFileObject;
    }

    private function buildPostEntityControllerFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $postEntityControllerFileObject = $this->createPostEntityControllerFileObject();
        $createEntityUseCaseFileObject = $this->createCreateEntityUseCaseFileObject();
        $createEntityUseCaseRequestBuilderFileObject = $this->createCreateEntityUseCaseRequestBuilderFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();
        $entityUseCaseDetailResponseFileObject = $this->createEntityUseCaseDetailResponseFileObject();
        $entityViewModelDetailAssemblerFileObject = $this->createEntityViewModelDetailAssemblerFileObject();
        $entityViewModelDetailFileObject = $this->createEntityViewModelDetailFileObject();
        $postEntityModelFileObject = $this->createPostEntityModelFileObject();
        $entityFileObject = $this->createEntityFileObject();

        $postEntityModelFileObject->setMethods(MethodUtility::buildWitherMethods($entityClassName));

        $postEntityControllerFileObject->setContent(
            $this->generateContent(
                [
                    ControllerFileObjectType::API_CONTROLLER_POST_ENTITY                                => $postEntityControllerFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE                        => $createEntityUseCaseFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER => $createEntityUseCaseRequestBuilderFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION                     => $entityNotFoundExceptionFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE              => $entityUseCaseDetailResponseFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER                            => $entityViewModelDetailAssemblerFileObject,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL                                      => $entityViewModelDetailFileObject,
                    ModelFileObjectType::API_MODEL_POST_ENTITY                                          => $postEntityModelFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY                                         => $entityFileObject,
                ]
            )
        );

        return $postEntityControllerFileObject;
    }

    private function createPostEntityControllerFileObject(): FileObject
    {
        return $this->controllerFileObjectFactory->create(
            ControllerFileObjectType::API_CONTROLLER_POST_ENTITY,
            $this->entity
        );
    }

    private function createCreateEntityUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function createCreateEntityUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityNotFoundExceptionFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityViewModelDetailAssemblerFileObject(): FileObject
    {
        return $this->viewModelFileObjectFactory->create(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityViewModelDetailFileObject(): FileObject
    {
        return $this->viewModelFileObjectFactory->create(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL,
            $this->domain,
            $this->entity
        );
    }

    private function createPostEntityModelFileObject(): FileObject
    {
        return $this->modelFileObjectFactory->create(
            ModelFileObjectType::API_MODEL_POST_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
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
    private function createSkeletonModel(array $fileObjects): PostEntityControllerSkeletonModel
    {
        return $this->postEntityControllerSkeletonModelBuilder
            ->create()
            ->withPostEntityControllerFileObject(
                $fileObjects[ControllerFileObjectType::API_CONTROLLER_POST_ENTITY]
            )
            ->withCreateEntityUseCaseFileObject(
                $fileObjects[UseCaseFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE]
            )
            ->withCreateEntityUseCaseRequestBuilderFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER]
            )
            ->withEntityNotFoundExceptionFileObject(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION]
            )
            ->withEntityUseCaseDetailResponseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE]
            )
            ->withEntityViewModelDetailAssemblerFileObject(
                $fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER]
            )
            ->withEntityViewModelDetailFileObject($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL])
            ->withPostEntityModelFileObject($fileObjects[ModelFileObjectType::API_MODEL_POST_ENTITY])
            ->withEntityFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY])
            ->build();
    }

    public function setPostEntityControllerSkeletonModelBuilder(
        PostEntityControllerSkeletonModelBuilder $postEntityControllerSkeletonModelBuilder
    ): void {
        $this->postEntityControllerSkeletonModelBuilder = $postEntityControllerSkeletonModelBuilder;
    }

    public function setControllerFileObjectFactory(ControllerFileObjectFactory $controllerFileObjectFactory): void
    {
        $this->controllerFileObjectFactory = $controllerFileObjectFactory;
    }

    public function setEntityFileObjectFactory(EntityFileObjectFactory $entityFileObjectFactory): void
    {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
    }

    public function setModelFileObjectFactory(ModelFileObjectFactory $modelFileObjectFactory): void
    {
        $this->modelFileObjectFactory = $modelFileObjectFactory;
    }

    public function setUseCaseFileObjectFactory(UseCaseFileObjectFactory $useCaseFileObjectFactory): void
    {
        $this->useCaseFileObjectFactory = $useCaseFileObjectFactory;
    }

    public function setUseCaseRequestFileObjectFactory(
        UseCaseRequestFileObjectFactory $useCaseRequestFileObjectFactory
    ): void {
        $this->useCaseRequestFileObjectFactory = $useCaseRequestFileObjectFactory;
    }

    public function setUseCaseResponseFileObjectFactory(
        UseCaseResponseFileObjectFactory $useCaseResponseFileObjectFactory
    ): void {
        $this->useCaseResponseFileObjectFactory = $useCaseResponseFileObjectFactory;
    }

    public function setViewModelFileObjectFactory(ViewModelFileObjectFactory $viewModelFileObjectFactory): void
    {
        $this->viewModelFileObjectFactory = $viewModelFileObjectFactory;
    }
}
