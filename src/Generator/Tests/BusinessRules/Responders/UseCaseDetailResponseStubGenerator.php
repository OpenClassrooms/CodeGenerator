<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\StubFieldUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
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
        $entityFileObject = $this->createEntityFileObject($className);
        $entityStubFileObject = $this->createEntityStubFileObject($entityFileObject);
        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject(
            $entityFileObject
        );
        $useCaseDetailResponseStubFileObject = $this->createUseCaseDetailResponseStubFileObject(
            $entityFileObject
        );

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

    private function createEntityFileObject(string $className): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $className
        );

        $useCaseDetailResponseDTOFileObject = $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $domain,
            $entity,
            $baseNamespace
        );

        return $useCaseDetailResponseDTOFileObject;
    }

    private function createEntityStubFileObject(FileObject $fileObject): FileObject
    {
        $useCaseDetailResponseDTOFileObject = $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $fileObject->getDomain(),
            $fileObject->getEntity(),
            $fileObject->getBaseNamespace()
        );

        return $useCaseDetailResponseDTOFileObject;
    }

    private function createUseCaseDetailResponseDTOFileObject(FileObject $fileObject): FileObject
    {

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $fileObject->getDomain(),
            $fileObject->getEntity(),
            $fileObject->getBaseNamespace()
        );
    }

    private function createUseCaseDetailResponseStubFileObject(FileObject $fileObject): FileObject
    {
        $useCaseDetailResponseStubFileObject = $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $fileObject->getDomain(),
            $fileObject->getEntity(),
            $fileObject->getBaseNamespace()
        );

        return $useCaseDetailResponseStubFileObject;
    }

    private function generateStubFields(FileObject $useCaseDetailResponseDTOFileObject): array
    {
        $useCaseDetailResponseFields = $this->getProtectedClassFields(
            $useCaseDetailResponseDTOFileObject->getClassName()
        );

        return StubFieldUtility::generateStubFieldObjects(
            $useCaseDetailResponseFields,
            $useCaseDetailResponseDTOFileObject
        );
    }

    private function generateConsts(FileObject $useCaseDetailResponseStubFileObject): array
    {
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
