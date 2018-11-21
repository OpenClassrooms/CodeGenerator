<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetailTestCase\ViewModelDetailTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetailTestCase\ViewModelDetailTestCaseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailTestCaseGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelDetailTestCaseSkeletonModelAssembler
     */
    private $viewModelDetailTestCaseSkeletonModelAssembler;

    public function buildDetailTestCaseFileObject(string $viewModelClassName): array
    {
        $viewModelFileObject = $this->buildViewModelFileObject($viewModelClassName);

        $viewModelDetailTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE,
            $viewModelFileObject->getDomain(),
            $viewModelFileObject->getEntity()
        );
        $viewModelDetailTestCaseFileObject->setFields(
            $this->getPublicClassFields($viewModelFileObject->getClassName())
        );

        return [$viewModelDetailTestCaseFileObject, $viewModelFileObject];

    }

    protected function buildViewModelFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_DETAIL, $domain, $entity);
    }

    private function createSkeletonModel(
        FileObject $viewModelDetailTestCaseFileObject,
        FileObject $viewModelFileObject
    ): ViewModelDetailTestCaseSkeletonModel
    {
        return $this->viewModelDetailTestCaseSkeletonModelAssembler->create(
            $viewModelDetailTestCaseFileObject,
            $viewModelFileObject
        );
    }

    /**
     * @param ViewModelDetailTestCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        [$viewModelDetailTestCaseFileObject, $viewModelFileObject] = $this->buildDetailTestCaseFileObject(
            $generatorRequest->getClassName()
        );
        $viewModelDetailTestCaseFileObject->setContent(
            $this->generateContent($viewModelDetailTestCaseFileObject, $viewModelFileObject)
        );
        $this->insertFileObject($viewModelDetailTestCaseFileObject);

        return $viewModelDetailTestCaseFileObject;
    }

    public function generateContent(
        FileObject $viewModelDetailTestCaseFileObject,
        FileObject $viewModelFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelDetailTestCaseFileObject, $viewModelFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    public function setViewModelDetailTestCaseSkeletonModelAssembler(
        ViewModelDetailTestCaseSkeletonModelAssembler $viewModelDetailTestCaseSkeletonModelAssembler
    )
    {
        $this->viewModelDetailTestCaseSkeletonModelAssembler = $viewModelDetailTestCaseSkeletonModelAssembler;
    }
}
