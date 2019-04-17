<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseListItemResponseAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseListItemResponseAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseListItemResponseAssemblerSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseAssemblerGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GenericUseCaseListItemResponseAssemblerSkeletonModelAssembler
     */
    private $genericUseCaseListItemResponseAssemblerSkeletonModelAssembler;

    /**
     * @param GenericUseCaseListItemResponseAssemblerGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseListItemResponseAssemblerFileObject = $this->buildGenericUseCaseListItemResponseAssemblerFileObject(
            $generatorRequest->getEntity()
        );

        $this->insertFileObject($genericUseCaseListItemResponseAssemblerFileObject);

        return $genericUseCaseListItemResponseAssemblerFileObject;
    }

    private function buildGenericUseCaseListItemResponseAssemblerFileObject(string $entityClassName): FileObject
    {
        $genericUseCaseListItemResponseAssemblerFileObject = $this->createGenericUseCaseListItemResponseAssemblerFileObject(
            $entityClassName
        );

        $genericUseCaseListItemResponseAssemblerFileObject->setContent(
            $this->generateContent($genericUseCaseListItemResponseAssemblerFileObject)
        );

        return $genericUseCaseListItemResponseAssemblerFileObject;
    }

    private function createGenericUseCaseListItemResponseAssemblerFileObject(string $entityClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function generateContent(FileObject $genericUseCaseListItemResponseAssemblerFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $genericUseCaseListItemResponseAssemblerFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $genericUseCaseListItemResponseAssemblerFileObject
    ): GenericUseCaseListItemResponseAssemblerSkeletonModel
    {
        return $this->genericUseCaseListItemResponseAssemblerSkeletonModelAssembler->create(
            $genericUseCaseListItemResponseAssemblerFileObject
        );
    }

    public function setGenericUseCaseListItemResponseAssemblerSkeletonModelAssembler(
        GenericUseCaseListItemResponseAssemblerSkeletonModelAssembler $genericUseCaseListItemResponseAssemblerSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseListItemResponseAssemblerSkeletonModelAssembler = $genericUseCaseListItemResponseAssemblerSkeletonModelAssembler;
    }
}
