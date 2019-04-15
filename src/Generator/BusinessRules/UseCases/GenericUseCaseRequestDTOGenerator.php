<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseRequestDTOSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseRequestDTOGenerator extends AbstractUseCaseGenerator
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
            $generatorRequest->getDomain(),
            $generatorRequest->getUseCaseName()
        );

        $this->insertFileObject($genericUseCaseRequestDTOFileObject);

        return $genericUseCaseRequestDTOFileObject;
    }

    private function buildGenericUseCaseRequestDTOFileObject(string $domain, string $useCaseName): FileObject
    {
        $genericUseCaseRequestDTOFileObject = $this->createGenericUseCaseRequestDTOFileObject($domain, $useCaseName);

        $genericUseCaseRequestFileObject = $this->createGenericUseCaseRequestFileObject($domain, $useCaseName);

        $genericUseCaseRequestDTOFileObject->setContent(
            $this->generateContent($genericUseCaseRequestDTOFileObject, $genericUseCaseRequestFileObject)
        );

        return $genericUseCaseRequestDTOFileObject;
    }

    private function createGenericUseCaseRequestDTOFileObject(string $domain, string $useCaseName): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_DTO,
            $domain,
            $useCaseName
        );
    }

    private function createGenericUseCaseRequestFileObject(string $domain, string $useCaseName): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST,
            $domain,
            $useCaseName
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
