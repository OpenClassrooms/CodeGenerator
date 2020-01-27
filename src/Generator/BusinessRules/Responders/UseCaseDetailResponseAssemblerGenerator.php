<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseAssemblerSkeletonModelAssembler;

class UseCaseDetailResponseAssemblerGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseDetailResponseAssemblerSkeletonModelAssembler
     */
    private $useCaseDetailResponseAssemblerSkeletonModelAssembler;

    /**
     * @param UseCaseDetailResponseAssemblerGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseDetailResponseAssemblerFileObject = $this->buildUseCaseDetailResponseAssemblerFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($useCaseDetailResponseAssemblerFileObject);

        return $useCaseDetailResponseAssemblerFileObject;
    }

    private function buildUseCaseDetailResponseAssemblerFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityFileObject = $this->createEntityFileObject();
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject();
        $useCaseDetailResponseAssemblerFileObject = $this->createUseCaseDetailResponseAssemblerFileObject();

        $useCaseDetailResponseAssemblerFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $useCaseDetailResponseFileObject,
                $useCaseDetailResponseAssemblerFileObject
            )
        );

        return $useCaseDetailResponseAssemblerFileObject;
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

    private function createUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseDetailResponseAssemblerFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseDetailResponseAssemblerFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $useCaseDetailResponseFileObject,
            $useCaseDetailResponseAssemblerFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseDetailResponseAssemblerFileObject
    ): UseCaseDetailResponseAssemblerSkeletonModel {
        return $this->useCaseDetailResponseAssemblerSkeletonModelAssembler->create(
            $entityFileObject,
            $useCaseDetailResponseFileObject,
            $useCaseDetailResponseAssemblerFileObject
        );
    }

    public function setUseCaseDetailResponseAssemblerSkeletonModelAssembler(
        UseCaseDetailResponseAssemblerSkeletonModelAssembler $useCaseDetailResponseAssemblerSkeletonModelAssembler
    ): void {
        $this->useCaseDetailResponseAssemblerSkeletonModelAssembler = $useCaseDetailResponseAssemblerSkeletonModelAssembler;
    }
}
