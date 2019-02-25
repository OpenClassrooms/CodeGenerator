<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractGenericUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseGenerator extends AbstractGenericUseCaseGenerator
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

        $genericUseCaseFileObject->setContent($this->generateContent($genericUseCaseFileObject));

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

    private function generateContent(FileObject $genericUseCaseFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($genericUseCaseFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(FileObject $genericUseCaseFileObject): GenericUseCaseSkeletonModel
    {
        return $this->genericUseCaseSkeletonModelAssembler->create($genericUseCaseFileObject);
    }

    public function setGenericUseCaseSkeletonModelAssembler(
        GenericUseCaseSkeletonModelAssembler $genericUseCaseSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseSkeletonModelAssembler = $genericUseCaseSkeletonModelAssembler;
    }
}
