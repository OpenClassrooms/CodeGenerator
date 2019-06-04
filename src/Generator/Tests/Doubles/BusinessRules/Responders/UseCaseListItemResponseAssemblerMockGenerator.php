<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseAssemblerMockGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseAssemblerMockGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseListItemResponseAssemblerMockSkeletonModelAssembler
     */
    private $useCaseListItemResponseAssemblerMockSkeletonModelAssembler;

    /**
     * @param UseCaseListItemResponseAssemblerMockGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseListItemResponseAssemblerMockFileObject = $this->buildUseCaseListItemResponseAssemblerMockFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($useCaseListItemResponseAssemblerMockFileObject);

        return $useCaseListItemResponseAssemblerMockFileObject;
    }

    private function buildUseCaseListItemResponseAssemblerMockFileObject(string $entityClassName): FileObject
    {
        $useCaseListItemResponseAssemblerImplFileObject = $this->createUseCaseListItemResponseAssemblerImplFileObject(
            $entityClassName
        );
        $useCaseListItemResponseAssemblerMockFileObject = $this->createUseCaseListItemResponseAssemblerMockFileObject(
            $useCaseListItemResponseAssemblerImplFileObject
        );

        $useCaseListItemResponseAssemblerMockFileObject->setContent(
            $this->generateContent(
                $useCaseListItemResponseAssemblerImplFileObject,
                $useCaseListItemResponseAssemblerMockFileObject
            )
        );

        return $useCaseListItemResponseAssemblerMockFileObject;
    }

    private function createUseCaseListItemResponseAssemblerImplFileObject(string $entityClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_IMPL,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createUseCaseListItemResponseAssemblerMockFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_MOCK,
            $fileObject->getDomain(),
            $fileObject->getEntity(),
            $fileObject->getBaseNamespace()
        );
    }

    private function generateContent(
        FileObject $useCaseListItemResponseAssemblerImplFileObject,
        FileObject $useCaseListItemResponseAssemblerMockFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseListItemResponseAssemblerImplFileObject,
            $useCaseListItemResponseAssemblerMockFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseListItemResponseAssemblerImplFileObject,
        FileObject $useCaseListItemResponseAssemblerMockFileObject
    ): UseCaseListItemResponseAssemblerMockSkeletonModel {
        return $this->useCaseListItemResponseAssemblerMockSkeletonModelAssembler->create(
            $useCaseListItemResponseAssemblerImplFileObject,
            $useCaseListItemResponseAssemblerMockFileObject
        );
    }

    public function setUseCaseListItemResponseAssemblerMockSkeletonModelAssembler(
        UseCaseListItemResponseAssemblerMockSkeletonModelAssembler $useCaseListItemResponseAssemblerMockSkeletonModelAssembler
    ): void {
        $this->useCaseListItemResponseAssemblerMockSkeletonModelAssembler = $useCaseListItemResponseAssemblerMockSkeletonModelAssembler;
    }
}
