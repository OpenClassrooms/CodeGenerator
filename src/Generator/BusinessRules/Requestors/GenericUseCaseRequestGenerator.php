<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GenericUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GenericUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GenericUseCaseRequestSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseRequestGenerator extends AbstractGenerator
{
    /**
     * @var GenericUseCaseRequestSkeletonModelAssembler
     */
    private $genericUseCaseRequestSkeletonModelAssembler;

    /**
     * @var UseCaseFileObjectFactory
     */
    private $useCaseFileObjectFactory;

    /**
     * @param GenericUseCaseRequestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseFileObject = $this->buildGenericUseCaseRequestFileObject(
            $generatorRequest->getDomain(),
            $generatorRequest->getUseCaseName()
        );

        $this->insertFileObject($genericUseCaseFileObject);

        return $genericUseCaseFileObject;
    }

    private function buildGenericUseCaseRequestFileObject(string $domain, string $useCaseName): FileObject
    {
        $genericUseCaseFileObject = $this->createGenericUseCaseRequestFileObject($domain, $useCaseName);

        $genericUseCaseFileObject->setContent($this->generateContent($genericUseCaseFileObject));

        return $genericUseCaseFileObject;
    }

    private function createGenericUseCaseRequestFileObject(string $domain, string $useCaseName): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST,
            $domain,
            $useCaseName
        );
    }

    private function generateContent(FileObject $genericUseCaseFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($genericUseCaseFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(FileObject $genericUseCaseFileObject): GenericUseCaseRequestSkeletonModel
    {
        return $this->genericUseCaseRequestSkeletonModelAssembler->create($genericUseCaseFileObject);
    }

    public function setGenericUseCaseRequestSkeletonModelAssembler(
        GenericUseCaseRequestSkeletonModelAssembler $genericUseCaseRequestSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseRequestSkeletonModelAssembler = $genericUseCaseRequestSkeletonModelAssembler;
    }

    public function setUseCaseFileObjectFactory(UseCaseFileObjectFactory $useCaseFileObjectFactory): void
    {
        $this->useCaseFileObjectFactory = $useCaseFileObjectFactory;
    }
}
