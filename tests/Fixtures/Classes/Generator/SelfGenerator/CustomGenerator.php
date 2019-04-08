<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\SelfGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\SelfGenerator\Request\CustomGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\CustomSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\SelfGenerator\CustomSkeletonModelAssembler;

/**
 * @author authorStub <author.stub@example.com>
 */
class CustomGenerator extends AbstractGenerator
{
    /**
     * @var CustomSkeletonModelAssembler
     */
    private $customSkeletonModelAssembler;

    /**
     * @param CustomGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $customFileObject = $this->buildCustomFileObject(
            $generatorRequest->getDefaultValue()
        //TODO get UseCaseRequest param(s)
        );

        $this->insertFileObject($customFileObject);

        return $customFileObject;
    }

    private function buildCustomFileObject(): FileObject
    {
        $customFileObject = $this->createCustomFileObject();

        $customFileObject->setContent(
            $this->generateContent(
            //TODO put FileObject(s)
            )
        );

        return $customFileObject;
    }

    private function createCustomFileObject(string $domain, string $useCaseName): FileObject
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
    ): void
    {
        $this->customSkeletonModelAssembler = $customSkeletonModelAssembler;
    }
}
