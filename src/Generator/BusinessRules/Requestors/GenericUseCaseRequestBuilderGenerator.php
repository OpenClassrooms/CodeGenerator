<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GenericUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GenericUseCaseRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseRequestBuilderGenerator extends AbstractGenerator
{
    /**
     * @var GenericUseCaseRequestBuilderSkeletonModelAssembler
     */
    private $genericUseCaseRequestBuilderSkeletonModelAssembler;

    /**
     * @var UseCaseFileObjectFactory
     */
    private $useCaseFileObjectFactory;

    /**
     * @param GenericUseCaseRequestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseRequestBuilderFileObject = $this->buildGenericUseCaseRequestBuilderFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($genericUseCaseRequestBuilderFileObject);

        return $genericUseCaseRequestBuilderFileObject;
    }

    private function buildGenericUseCaseRequestBuilderFileObject(string $useCaseResponseClassName): FileObject
    {
        $genericUseCaseRequestBuilderFileObject = $this->createGenericUseCaseRequestBuilderFileObject(
            $useCaseResponseClassName
        );

        $genericUseCaseRequestFileObject = $this->createGenericUseCaseRequestFileObject(
            $genericUseCaseRequestBuilderFileObject
        );

        $genericUseCaseRequestBuilderFileObject->setContent(
            $this->generateContent($genericUseCaseRequestBuilderFileObject, $genericUseCaseRequestFileObject)
        );

        return $genericUseCaseRequestBuilderFileObject;
    }

    private function createGenericUseCaseRequestBuilderFileObject($useCaseResponseClassName): FileObject
    {
        [$domain, $entity] = FileObjectUtility::getDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER,
            $domain,
            $entity
        );
    }

    private function createGenericUseCaseRequestFileObject(
        FileObject $genericUseCaseRequestBuilderFileObject
    ): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST,
            $genericUseCaseRequestBuilderFileObject->getDomain(),
            $genericUseCaseRequestBuilderFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $genericUseCaseRequestBuilderFileObject,
        FileObject $genericUseCaseRequestFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $genericUseCaseRequestBuilderFileObject,
            $genericUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $genericUseCaseRequestBuilderFileObject,
        FileObject $genericUseCaseRequestFileObject

    ): GenericUseCaseRequestBuilderSkeletonModel
    {
        return $this->genericUseCaseRequestBuilderSkeletonModelAssembler->create(
            $genericUseCaseRequestBuilderFileObject,
            $genericUseCaseRequestFileObject
        );
    }

    public function setGenericUseCaseRequestBuilderSkeletonModelAssembler(
        GenericUseCaseRequestBuilderSkeletonModelAssembler $genericUseCaseRequestBuilderSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseRequestBuilderSkeletonModelAssembler = $genericUseCaseRequestBuilderSkeletonModelAssembler;
    }

    public function setUseCaseFileObjectFactory(UseCaseFileObjectFactory $useCaseFileObjectFactory): void
    {
        $this->useCaseFileObjectFactory = $useCaseFileObjectFactory;
    }
}
