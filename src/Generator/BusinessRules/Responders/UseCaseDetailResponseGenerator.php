<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseDetailResponseSkeletonModelAssembler
     */
    private $useCaseDetailResponseSkeletonModelAssembler;

    /**
     * @param UseCaseDetailResponseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseDetailResponseFileObject = $this->buildUseCaseDetailResponseFileObject(
            $generatorRequest->getEntityClassName(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseDetailResponseFileObject);

        return $useCaseDetailResponseFileObject;
    }

    /**
     * @param string[] $wantedFields
     */
    private function buildUseCaseDetailResponseFileObject(string $entityClassName, array $wantedFields = []): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject();
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject();

        $useCaseDetailResponseFileObject->setMethods(
            $this->getSelectedAccessors($entityClassName, $wantedFields)
        );
        $useCaseDetailResponseFileObject->setContent(
            $this->generateContent($useCaseResponseFileObject, $useCaseDetailResponseFileObject)
        );

        return $useCaseDetailResponseFileObject;
    }

    private function createUseCaseResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseDetailResponseFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseResponseFileObject,
            $useCaseDetailResponseFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseDetailResponseFileObject
    ): UseCaseDetailResponseSkeletonModel {
        return $this->useCaseDetailResponseSkeletonModelAssembler->create(
            $useCaseResponseFileObject,
            $useCaseDetailResponseFileObject
        );
    }

    public function setUseCaseDetailResponseSkeletonModelAssembler(
        UseCaseDetailResponseSkeletonModelAssembler $useCaseDetailResponseSkeletonModelAssembler
    ): void {
        $this->useCaseDetailResponseSkeletonModelAssembler = $useCaseDetailResponseSkeletonModelAssembler;
    }
}
