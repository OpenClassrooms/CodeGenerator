<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseAssemblerMockGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseAssemblerMockSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseAssemblerMockSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseAssemblerMockGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseDetailResponseAssemblerMockSkeletonModelAssembler
     */
    private $useCaseDetailResponseAssemblerMockSkeletonModelAssembler;

    /**
     * @param UseCaseDetailResponseAssemblerMockGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseDetailResponseAssemblerMockFileObject = $this->buildUseCaseDetailResponseAssemblerMockFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($useCaseDetailResponseAssemblerMockFileObject);

        return $useCaseDetailResponseAssemblerMockFileObject;
    }

    private function buildUseCaseDetailResponseAssemblerMockFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $useCaseDetailResponseAssemblerImplFileObject = $this->createUseCaseDetailResponseAssemblerImplFileObject();
        $useCaseDetailResponseAssemblerMockFileObject = $this->createUseCaseDetailResponseAssemblerMockFileObject();

        $useCaseDetailResponseAssemblerMockFileObject->setContent(
            $this->generateContent(
                $useCaseDetailResponseAssemblerImplFileObject,
                $useCaseDetailResponseAssemblerMockFileObject
            )
        );

        return $useCaseDetailResponseAssemblerMockFileObject;
    }

    private function createUseCaseDetailResponseAssemblerImplFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_IMPL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseDetailResponseAssemblerMockFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_MOCK,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $useCaseDetailResponseAssemblerImplFileObject,
        FileObject $useCaseDetailResponseAssemblerMockFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseDetailResponseAssemblerImplFileObject,
            $useCaseDetailResponseAssemblerMockFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseDetailResponseAssemblerImplFileObject,
        FileObject $useCaseDetailResponseAssemblerMockFileObject
    ): UseCaseDetailResponseAssemblerMockSkeletonModel {
        return $this->useCaseDetailResponseAssemblerMockSkeletonModelAssembler->create(
            $useCaseDetailResponseAssemblerImplFileObject,
            $useCaseDetailResponseAssemblerMockFileObject
        );
    }

    public function setUseCaseDetailResponseAssemblerMockSkeletonModelAssembler(
        UseCaseDetailResponseAssemblerMockSkeletonModelAssembler $useCaseDetailResponseAssemblerMockSkeletonModelAssembler
    ): void {
        $this->useCaseDetailResponseAssemblerMockSkeletonModelAssembler = $useCaseDetailResponseAssemblerMockSkeletonModelAssembler;
    }
}
