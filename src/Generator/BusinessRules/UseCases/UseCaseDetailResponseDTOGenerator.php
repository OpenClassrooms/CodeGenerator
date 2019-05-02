<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseDetailResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseDetailResponseDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseDetailResponseDTOSkeletonModelAssembler
     */
    private $useCaseDetailResponseDTOSkeletonModelAssembler;

    /**
     * @param UseCaseDetailResponseDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseDetailResponseDTOFileObject = $this->buildUseCaseDetailResponseDTOFileObject(
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseDetailResponseDTOFileObject);

        return $useCaseDetailResponseDTOFileObject;
    }

    /**
     * @param string[] $fields
     */
    private function buildUseCaseDetailResponseDTOFileObject(string $entityClassName, array $fields): FileObject
    {
        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject(
            $entityClassName
        );
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject(
            $useCaseDetailResponseDTOFileObject
        );
        $useCaseResponseDTOFileObject = $this->createUseCaseResponseDTOFileObject(
            $useCaseDetailResponseDTOFileObject
        );

        $useCaseDetailResponseDTOFileObject->setFields($this->getSelectedFields($entityClassName, $fields));
        $useCaseDetailResponseDTOFileObject->setMethods(
            MethodUtility::getSelectedAccessors($entityClassName, $fields)
        );

        $useCaseDetailResponseDTOFileObject->setContent(
            $this->generateContent(
                $useCaseDetailResponseDTOFileObject,
                $useCaseDetailResponseFileObject,
                $useCaseResponseDTOFileObject
            )
        );

        return $useCaseDetailResponseDTOFileObject;
    }

    private function createUseCaseDetailResponseDTOFileObject(
        string $entityClassName
    ): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    public function createUseCaseDetailResponseFileObject(FileObject $useCaseDetailResponseDTOFileObject)
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $useCaseDetailResponseDTOFileObject->getDomain(),
            $useCaseDetailResponseDTOFileObject->getEntity()
        );
    }

    public function createUseCaseResponseDTOFileObject(FileObject $useCaseDetailResponseDTOFileObject)
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $useCaseDetailResponseDTOFileObject->getDomain(),
            $useCaseDetailResponseDTOFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseDetailResponseDTOFileObject,
            $useCaseDetailResponseFileObject,
            $useCaseResponseDTOFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): UseCaseDetailResponseDTOSkeletonModel
    {
        return $this->useCaseDetailResponseDTOSkeletonModelAssembler->create(
            $useCaseDetailResponseDTOFileObject,
            $useCaseDetailResponseFileObject,
            $useCaseResponseDTOFileObject
        );
    }

    public function setUseCaseDetailResponseDTOSkeletonModelAssembler(
        UseCaseDetailResponseDTOSkeletonModelAssembler $useCaseDetailResponseDTOSkeletonModelAssembler
    ): void
    {
        $this->useCaseDetailResponseDTOSkeletonModelAssembler = $useCaseDetailResponseDTOSkeletonModelAssembler;
    }
}
