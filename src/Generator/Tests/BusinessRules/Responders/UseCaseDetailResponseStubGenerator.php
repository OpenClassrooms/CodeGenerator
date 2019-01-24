<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\FileObjects\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
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
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($useCaseDetailResponseStubFileObject);

        return $useCaseDetailResponseStubFileObject;
    }

    private function buildUseCaseDetailResponseStubFileObject(string $useCaseResponseClassName)
    {
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject(
            $useCaseResponseClassName
        );
        $entityStubFileObject = $this->createEntityStubFileObject($useCaseDetailResponseFileObject);
        $useCaseDetailResponseStubFileObject = $this->createUseCaseDetailResponseStubFileObject(
            $useCaseDetailResponseFileObject
        );

        $useCaseDetailResponseStubFileObject->setFields($this->generateStubFields($useCaseDetailResponseFileObject));
        $useCaseDetailResponseStubFileObject->setConsts($this->generateConsts($entityStubFileObject));
        $useCaseDetailResponseStubFileObject->setContent(
            $this->generateContent(
                $useCaseDetailResponseStubFileObject,
                $useCaseDetailResponseFileObject,
                $entityStubFileObject
            )
        );

        return $useCaseDetailResponseStubFileObject;
    }

    private function createUseCaseDetailResponseFileObject(string $responseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($responseClassName);

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $domain,
            $entity
        );
    }

    private function createEntityStubFileObject(FileObject $useCaseDetailResponseFileObject): FileObject
    {
        $useCaseDetailResponseFileObject = $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity()
        );

        return $useCaseDetailResponseFileObject;
    }

    private function createUseCaseDetailResponseStubFileObject(FileObject $useCaseDetailResponseFileObject): FileObject
    {
        $useCaseDetailResponseStubFileObject = $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity()
        );

        return $useCaseDetailResponseStubFileObject;
    }

    private function generateStubFields(FileObject $useCaseDetailResponseFileObject): array
    {
        $useCaseDetailResponseFields = $this->getParentAndChildPublicClassFields(
            $useCaseDetailResponseFileObject->getClassName()
        );

        return FieldUtility::generateStubFieldObjects($useCaseDetailResponseFields, $useCaseDetailResponseFileObject);
    }

    private function generateConsts(FileObject $entityStubFileObject): array
    {
        $entityStubFileObject->setConsts(
            $this->getClassConstants($entityStubFileObject->getClassName())
        );

        return ConstUtility::generateConstsFromStubReference($entityStubFileObject);
    }

    private function generateContent(
        FileObject $useCaseDetailResponseStubFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $entityStubFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseDetailResponseStubFileObject,
            $useCaseDetailResponseFileObject,
            $entityStubFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseDetailResponseStubFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $entityStubFileObject
    ): UseCaseDetailResponseStubSkeletonModel
    {
        return $this->useCaseDetailResponseStubSkeletonModelAssembler->create(
            $useCaseDetailResponseStubFileObject,
            $useCaseDetailResponseFileObject,
            $entityStubFileObject
        );
    }

    public function setUseCaseDetailResponseStubSkeletonModelAssembler(
        UseCaseDetailResponseStubSkeletonModelAssembler $useCaseDetailResponseStubSkeletonModelAssembler
    ): void
    {
        $this->useCaseDetailResponseStubSkeletonModelAssembler = $useCaseDetailResponseStubSkeletonModelAssembler;
    }
}
