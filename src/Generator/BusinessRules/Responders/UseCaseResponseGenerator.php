<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseResponseSkeletonModelAssembler
     */
    private $useCaseResponseSkeletonModelAssembler;

    /**
     * @param UseCaseResponseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseResponseFileObject = $this->buildUseCaseResponseFileObject(
            $generatorRequest->getEntityClassName(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseResponseFileObject);

        return $useCaseResponseFileObject;
    }

    /**
     * @param string[] $wantedFields
     */
    private function buildUseCaseResponseFileObject(string $entityClassName, array $wantedFields = []): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject();

        $fields = FieldUtility::getFields($entityClassName, $wantedFields);
        $useCaseResponseFileObject->setMethods($this->getSelectedAccessors($entityClassName, $fields));
        $useCaseResponseFileObject->setContent($this->generateContent($useCaseResponseFileObject));

        return $useCaseResponseFileObject;
    }

    private function createUseCaseResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(FileObject $useCaseResponseFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($useCaseResponseFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseResponseFileObject
    ): UseCaseResponseSkeletonModel {
        return $this->useCaseResponseSkeletonModelAssembler->create($useCaseResponseFileObject);
    }

    public function setUseCaseResponseSkeletonModelAssembler(
        UseCaseResponseSkeletonModelAssembler $useCaseResponseSkeletonModelAssembler
    ): void {
        $this->useCaseResponseSkeletonModelAssembler = $useCaseResponseSkeletonModelAssembler;
    }
}
