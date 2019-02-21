<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractGenericUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseRequestDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseRequestDTOGenerator extends AbstractGenericUseCaseGenerator
{
    /**
     * @var GenericUseCaseRequestDTOSkeletonModelAssembler
     */
    private $genericUseCaseRequestDTOSkeletonModelAssembler;

    /**
     * @param GenericUseCaseRequestDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseRequestDTOFileObject = $this->buildGenericUseCaseRequestDTOFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($genericUseCaseRequestDTOFileObject);

        return $genericUseCaseRequestDTOFileObject;
    }

    private function buildGenericUseCaseRequestDTOFileObject(string $useCaseResponseClassName): FileObject
    {
        $genericUseCaseRequestDTOFileObject = $this->createGenericUseCaseRequestDTOFileObject(
            $useCaseResponseClassName
        );

        $genericUseCaseRequestFileObject = $this->createGenericUseCaseRequestFileObject(
            $genericUseCaseRequestDTOFileObject
        );

        $genericUseCaseRequestDTOFileObject->setContent(
            $this->generateContent($genericUseCaseRequestDTOFileObject, $genericUseCaseRequestFileObject)
        );

        return $genericUseCaseRequestDTOFileObject;
    }

    private function createGenericUseCaseRequestDTOFileObject($useCaseResponseClassName): FileObject
    {
        [$domain, $entity] = FileObjectUtility::getDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_DTO,
            $domain,
            $entity
        );
    }

    private function createGenericUseCaseRequestFileObject(FileObject $genericUseCaseRequestDTOFileObject): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST,
            $genericUseCaseRequestDTOFileObject->getDomain(),
            $genericUseCaseRequestDTOFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $genericUseCaseRequestDTOFileObject,
        FileObject $genericUseCaseRequestFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $genericUseCaseRequestDTOFileObject,
            $genericUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $genericUseCaseRequestDTOFileObject,
        FileObject $genericUseCaseRequestFileObject
    ): GenericUseCaseRequestDTOSkeletonModel
    {
        return $this->genericUseCaseRequestDTOSkeletonModelAssembler->create(
            $genericUseCaseRequestDTOFileObject,
            $genericUseCaseRequestFileObject
        );
    }

    public function setGenericUseCaseRequestDTOSkeletonModelAssembler(
        GenericUseCaseRequestDTOSkeletonModelAssembler $genericUseCaseRequestDTOSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseRequestDTOSkeletonModelAssembler = $genericUseCaseRequestDTOSkeletonModelAssembler;
    }
}
