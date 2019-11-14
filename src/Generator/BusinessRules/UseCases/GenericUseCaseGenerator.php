<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GenericUseCaseSkeletonModelAssembler
     */
    private $genericUseCaseSkeletonModelAssembler;

    /**
     * @param GenericUseCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseFileObject = $this->buildGenericUseCaseFileObject(
            $generatorRequest->getDomain(),
            $generatorRequest->getUseCaseName()
        );

        $this->insertFileObject($genericUseCaseFileObject);

        return $genericUseCaseFileObject;
    }

    private function buildGenericUseCaseFileObject(string $domain, string $useCaseName): FileObject
    {
        $genericUseCaseFileObject = $this->createGenericUseCaseFileObject($domain, $useCaseName);
        $genericUseCaseRequestFileObject = $this->createGenericUseCaseRequestFileObject($domain, $useCaseName);

        $genericUseCaseFileObject->setContent(
            $this->generateContent($genericUseCaseFileObject, $genericUseCaseRequestFileObject)
        );

        return $genericUseCaseFileObject;
    }

    private function createGenericUseCaseFileObject(string $domain, string $useCaseName): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE,
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
        FileObject $genericUseCaseFileObject,
        FileObject $genericUseCaseRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel($genericUseCaseFileObject, $genericUseCaseRequestFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $genericUseCaseFileObject,
        FileObject $genericUseCaseRequestFileObject
    ): GenericUseCaseSkeletonModel {
        return $this->genericUseCaseSkeletonModelAssembler->create(
            $genericUseCaseFileObject,
            $genericUseCaseRequestFileObject
        );
    }

    public function setGenericUseCaseSkeletonModelAssembler(
        GenericUseCaseSkeletonModelAssembler $genericUseCaseSkeletonModelAssembler
    ): void {
        $this->genericUseCaseSkeletonModelAssembler = $genericUseCaseSkeletonModelAssembler;
    }
}
