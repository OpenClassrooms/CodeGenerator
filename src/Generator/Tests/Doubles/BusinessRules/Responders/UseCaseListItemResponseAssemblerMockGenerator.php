<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseAssemblerMockGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockSkeletonModelAssembler;

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
        $this->initFileObjectParameter($entityClassName);
        $useCaseListItemResponseAssemblerImplFileObject = $this->createUseCaseListItemResponseAssemblerImplFileObject();
        $useCaseListItemResponseAssemblerMockFileObject = $this->createUseCaseListItemResponseAssemblerMockFileObject();

        $useCaseListItemResponseAssemblerMockFileObject->setContent(
            $this->generateContent(
                $useCaseListItemResponseAssemblerImplFileObject,
                $useCaseListItemResponseAssemblerMockFileObject
            )
        );

        return $useCaseListItemResponseAssemblerMockFileObject;
    }

    private function createUseCaseListItemResponseAssemblerImplFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_IMPL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseListItemResponseAssemblerMockFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_MOCK,
            $this->domain,
            $this->entity,
            $this->baseNamespace
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
