<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\Request\CustomGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\CustomSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\GenerateGenerator\CustomSkeletonModelAssembler;

class CustomGenerator extends AbstractGenerator
{
    private CustomSkeletonModelAssembler $customSkeletonModelAssembler;

    /**
     * @param CustomGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $customFileObject = $this->buildCustomFileObject(
            $generatorRequest->getEntityClassName()
            //TODO get UseCaseRequest param(s)
        );

        $this->insertFileObject($customFileObject);

        return $customFileObject;
    }

    private function buildCustomFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $customFileObject = $this->createCustomFileObject();

        $customFileObject->setContent(
            $this->generateContent(
                //TODO put FileObject(s)
            )
        );

        return $customFileObject;
    }

    private function createCustomFileObject(): FileObject
    {
        // TODO use factory to create FileObject
    }

    private function generateContent(): string
    {
        $skeletonModel = $this->createSkeletonModel(
            //TODO put FileObject(s)
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(): CustomSkeletonModel
    {
        return $this->customSkeletonModelAssembler->create(
            //TODO put FileObject(s)
        );
    }

    public function setCustomSkeletonModelAssembler(
        CustomSkeletonModelAssembler $customSkeletonModelAssembler
    ): void {
        $this->customSkeletonModelAssembler = $customSkeletonModelAssembler;
    }
}
