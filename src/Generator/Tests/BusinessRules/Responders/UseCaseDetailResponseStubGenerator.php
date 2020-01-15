<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\StubFieldUtility;

class UseCaseDetailResponseStubGenerator extends AbstractUseCaseResponseStubGenerator
{
    /**
     * @var UseCaseDetailResponseStubSkeletonModelAssembler
     */
    private $useCaseDetailResponseStubSkeletonModelAssembler;

    /**
     * @param UseCaseDetailResponseStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseDetailResponseStubFileObject = $this->buildUseCaseDetailResponseStubFileObject(
            $generatorRequest->getClassName()
        );

        $this->insertFileObject($useCaseDetailResponseStubFileObject);

        return $useCaseDetailResponseStubFileObject;
    }

    private function buildUseCaseDetailResponseStubFileObject(string $className)
    {
        $this->initFileObjectParameter($className);
        $entityFileObject = $this->createEntityFileObject();
        $entityStubFileObject = $this->createEntityStubFileObject();
        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject();
        $useCaseDetailResponseStubFileObject = $this->createUseCaseDetailResponseStubFileObject();

        $useCaseDetailResponseStubFileObject->setFields($this->generateStubFields($entityFileObject));
        $useCaseDetailResponseStubFileObject->setConsts($this->generateConsts($useCaseDetailResponseStubFileObject));
        $useCaseDetailResponseStubFileObject->setContent(
            $this->generateContent(
                $useCaseDetailResponseStubFileObject,
                $useCaseDetailResponseDTOFileObject,
                $entityStubFileObject
            )
        );

        return $useCaseDetailResponseStubFileObject;
    }

    private function createEntityFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createEntityStubFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseDetailResponseDTOFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseDetailResponseStubFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateStubFields(
        FileObject $useCaseDetailResponseDTOFileObject
    ): array {
        $useCaseDetailResponseFields = $this->getProtectedClassFields(
            $useCaseDetailResponseDTOFileObject->getClassName()
        );

        return StubFieldUtility::generateStubFieldObjects(
            $useCaseDetailResponseFields,
            $useCaseDetailResponseDTOFileObject
        );
    }

    private function generateConsts(
        FileObject $useCaseDetailResponseStubFileObject
    ): array {
        return ConstUtility::generateConstsFromStubFileObject($useCaseDetailResponseStubFileObject);
    }

    private function generateContent(
        FileObject $useCaseDetailResponseStubFileObject,
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $entityStubFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseDetailResponseStubFileObject,
            $useCaseDetailResponseDTOFileObject,
            $entityStubFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseDetailResponseStubFileObject,
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $entityStubFileObject
    ): UseCaseDetailResponseStubSkeletonModel {
        return $this->useCaseDetailResponseStubSkeletonModelAssembler->create(
            $useCaseDetailResponseStubFileObject,
            $useCaseDetailResponseDTOFileObject,
            $entityStubFileObject
        );
    }

    public function setUseCaseDetailResponseStubSkeletonModelAssembler(
        UseCaseDetailResponseStubSkeletonModelAssembler $useCaseDetailResponseStubSkeletonModelAssembler
    ): void {
        $this->useCaseDetailResponseStubSkeletonModelAssembler = $useCaseDetailResponseStubSkeletonModelAssembler;
    }
}
