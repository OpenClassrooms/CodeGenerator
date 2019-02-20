<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseGenerator extends AbstractGenerator
{
    /**
     * @var GenericUseCaseSkeletonModelAssembler
     */
    private $genericUseCaseSkeletonModelAssembler;

    /**
     * @var UseCaseFileObjectFactory
     */
    private $useCaseFileObjectFactory;

    /**
     * @param GenericUseCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseFileObject = $this->buildGenericUseCaseFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($genericUseCaseFileObject);

        return $genericUseCaseFileObject;
    }

    private function buildGenericUseCaseFileObject(string $useCaseResponseClassName): FileObject
    {
        $genericUseCaseFileObject = $this->createGenericUseCaseFileObject($useCaseResponseClassName);

        $genericUseCaseFileObject->setContent($this->generateContent($genericUseCaseFileObject));

        return $genericUseCaseFileObject;
    }

    private function createGenericUseCaseFileObject($useCaseResponseClassName): FileObject
    {
        [$domain, $entity] = FileObjectUtility::getDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE,
            $domain,
            $entity
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

    public function setUseCaseFileObjectFactory(UseCaseFileObjectFactory $useCaseFileObjectFactory): void
    {
        $this->useCaseFileObjectFactory = $useCaseFileObjectFactory;
    }
}
