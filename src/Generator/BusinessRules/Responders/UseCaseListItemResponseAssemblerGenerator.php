<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseListItemResponseAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseListItemResponseAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseListItemResponseAssemblerSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseAssemblerGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseListItemResponseAssemblerSkeletonModelAssembler
     */
    private $useCaseListItemResponseAssemblerSkeletonModelAssembler;

    /**
     * @param UseCaseListItemResponseAssemblerGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseListItemResponseAssemblerFileObject = $this->buildUseCaseListItemResponseAssemblerFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($useCaseListItemResponseAssemblerFileObject);

        return $useCaseListItemResponseAssemblerFileObject;
    }

    private function buildUseCaseListItemResponseAssemblerFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $useCaseListItemResponseAssemblerFileObject = $this->createUseCaseListItemResponseAssemblerFileObject();

        $useCaseListItemResponseAssemblerFileObject->setContent(
            $this->generateContent($useCaseListItemResponseAssemblerFileObject)
        );

        return $useCaseListItemResponseAssemblerFileObject;
    }

    private function createUseCaseListItemResponseAssemblerFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $useCaseListItemResponseAssemblerFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseListItemResponseAssemblerFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseListItemResponseAssemblerFileObject
    ): UseCaseListItemResponseAssemblerSkeletonModel {
        return $this->useCaseListItemResponseAssemblerSkeletonModelAssembler->create(
            $useCaseListItemResponseAssemblerFileObject
        );
    }

    public function setUseCaseListItemResponseAssemblerSkeletonModelAssembler(
        UseCaseListItemResponseAssemblerSkeletonModelAssembler $useCaseListItemResponseAssemblerSkeletonModelAssembler
    ): void {
        $this->useCaseListItemResponseAssemblerSkeletonModelAssembler = $useCaseListItemResponseAssemblerSkeletonModelAssembler;
    }
}
