<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseAssemblerSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
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
            $generatorRequest->getEntity()
        );

        $this->insertFileObject($useCaseDetailResponseAssemblerFileObject);

        return $useCaseDetailResponseAssemblerFileObject;
    }

    private function buildUseCaseDetailResponseAssemblerFileObject(string $entityClassName): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject(
            $entityFileObject
        );
        $useCaseDetailResponseAssemblerFileObject = $this->createUseCaseDetailResponseAssemblerFileObject(
            $entityFileObject
        );

        $useCaseDetailResponseAssemblerFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $useCaseDetailResponseFileObject,
                $useCaseDetailResponseAssemblerFileObject
            )
        );

        return $useCaseDetailResponseAssemblerFileObject;
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

    private function createUseCaseDetailResponseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createUseCaseDetailResponseAssemblerFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseDetailResponseAssemblerFileObject
    ): string
    {
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
    ): UseCaseDetailResponseAssemblerSkeletonModel
    {
        return $this->useCaseDetailResponseAssemblerSkeletonModelAssembler->create(
            $entityFileObject,
            $useCaseDetailResponseFileObject,
            $useCaseDetailResponseAssemblerFileObject
        );
    }

    public function setUseCaseDetailResponseAssemblerSkeletonModelAssembler(
        UseCaseDetailResponseAssemblerSkeletonModelAssembler $useCaseDetailResponseAssemblerSkeletonModelAssembler
    ): void
    {
        $this->useCaseDetailResponseAssemblerSkeletonModelAssembler = $useCaseDetailResponseAssemblerSkeletonModelAssembler;
    }
}
