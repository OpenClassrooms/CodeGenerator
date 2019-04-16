<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseDetailResponseAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseDetailResponseAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseDetailResponseAssemblerSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseAssemblerGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GenericUseCaseDetailResponseAssemblerSkeletonModelAssembler
     */
    private $genericUseCaseDetailResponseAssemblerSkeletonModelAssembler;

    /**
     * @param GenericUseCaseDetailResponseAssemblerGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseDetailResponseAssemblerFileObject = $this->buildGenericUseCaseDetailResponseAssemblerFileObject(
            $generatorRequest->getEntity()
        );

        $this->insertFileObject($genericUseCaseDetailResponseAssemblerFileObject);

        return $genericUseCaseDetailResponseAssemblerFileObject;
    }

    private function buildGenericUseCaseDetailResponseAssemblerFileObject(string $entityClassName): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $genericUseCaseDetailResponseFileObject = $this->createGenericUseCaseDetailResponseFileObject(
            $entityFileObject
        );
        $genericUseCaseDetailResponseAssemblerFileObject = $this->createGenericUseCaseDetailResponseAssemblerFileObject(
            $entityFileObject
        );

        $genericUseCaseDetailResponseAssemblerFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $genericUseCaseDetailResponseFileObject,
                $genericUseCaseDetailResponseAssemblerFileObject
            )
        );

        return $genericUseCaseDetailResponseAssemblerFileObject;
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

    private function createGenericUseCaseDetailResponseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createGenericUseCaseDetailResponseAssemblerFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $genericUseCaseDetailResponseFileObject,
        FileObject $genericUseCaseDetailResponseAssemblerFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $genericUseCaseDetailResponseFileObject,
            $genericUseCaseDetailResponseAssemblerFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $genericUseCaseDetailResponseFileObject,
        FileObject $genericUseCaseDetailResponseAssemblerFileObject
    ): GenericUseCaseDetailResponseAssemblerSkeletonModel
    {
        return $this->genericUseCaseDetailResponseAssemblerSkeletonModelAssembler->create(
            $entityFileObject,
            $genericUseCaseDetailResponseFileObject,
            $genericUseCaseDetailResponseAssemblerFileObject
        );
    }

    public function setGenericUseCaseDetailResponseAssemblerSkeletonModelAssembler(
        GenericUseCaseDetailResponseAssemblerSkeletonModelAssembler $genericUseCaseDetailResponseAssemblerSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseDetailResponseAssemblerSkeletonModelAssembler = $genericUseCaseDetailResponseAssemblerSkeletonModelAssembler;
    }
}
