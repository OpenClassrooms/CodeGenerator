<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\FileObjects\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

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
        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject(
            $useCaseResponseClassName
        );
        $entityStubFileObject = $this->createEntityStubFileObject($useCaseDetailResponseDTOFileObject);
        $useCaseDetailResponseStubFileObject = $this->createUseCaseDetailResponseStubFileObject(
            $useCaseDetailResponseDTOFileObject
        );

        $useCaseDetailResponseStubFileObject->setFields($this->generateStubFields($useCaseDetailResponseDTOFileObject));
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

    private function createUseCaseDetailResponseDTOFileObject(string $responseClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($responseClassName);

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createEntityStubFileObject(FileObject $useCaseDetailResponseDTOFileObject): FileObject
    {
        $useCaseDetailResponseDTOFileObject = $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $useCaseDetailResponseDTOFileObject->getDomain(),
            $useCaseDetailResponseDTOFileObject->getEntity(),
            $useCaseDetailResponseDTOFileObject->getBaseNamespace()
        );

        return $useCaseDetailResponseDTOFileObject;
    }

    private function createUseCaseDetailResponseStubFileObject(
        FileObject $useCaseDetailResponseDTOFileObject
    ): FileObject
    {
        $useCaseDetailResponseStubFileObject = $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $useCaseDetailResponseDTOFileObject->getDomain(),
            $useCaseDetailResponseDTOFileObject->getEntity(),
            $useCaseDetailResponseDTOFileObject->getBaseNamespace()
        );

        return $useCaseDetailResponseStubFileObject;
    }

    private function generateStubFields(FileObject $useCaseDetailResponseDTOFileObject): array
    {
        $useCaseDetailResponseFields = $this->getParentAndChildPublicClassFields(
            $useCaseDetailResponseDTOFileObject->getClassName()
        );

        return FieldUtility::generateStubFieldObjects(
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
    ): string
    {
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
    ): UseCaseDetailResponseStubSkeletonModel
    {
        return $this->useCaseDetailResponseStubSkeletonModelAssembler->create(
            $useCaseDetailResponseStubFileObject,
            $useCaseDetailResponseDTOFileObject,
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
