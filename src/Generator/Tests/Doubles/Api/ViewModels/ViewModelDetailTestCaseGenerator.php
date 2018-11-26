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

    /**
     * @param ViewModelDetailTestCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailFileObject = $this->buildViewModelDetailFileObject($generatorRequest->getClassName());
        $viewModelDetailTestCaseFileObject = $this->buildDetailTestCaseFileObject($viewModelDetailFileObject);
        $viewModelDetailTestCaseFileObject->setContent(
            $this->generateContent($viewModelDetailTestCaseFileObject, $viewModelDetailFileObject)
        );
        $this->insertFileObject($viewModelDetailTestCaseFileObject);

        return $viewModelDetailTestCaseFileObject;
    }

    protected function buildViewModelDetailFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_DETAIL, $domain, $entity);
    }

    public function buildDetailTestCaseFileObject(FileObject $viewModelDetailFileObject): FileObject
    {
        $viewModelDetailTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE,
            $viewModelDetailFileObject->getDomain(),
            $viewModelDetailFileObject->getEntity()
        );
        $viewModelDetailTestCaseFileObject->setFields(
            $this->getPublicClassFields($viewModelDetailFileObject->getClassName())
        );

        return $viewModelDetailTestCaseFileObject;

    }

    public function generateContent(
        FileObject $viewModelDetailTestCaseFileObject,
        FileObject $viewModelDetailFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelDetailTestCaseFileObject, $viewModelDetailFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelDetailTestCaseFileObject,
        FileObject $viewModelDetailFileObject
    ): ViewModelDetailTestCaseSkeletonModel
    {
        return $this->viewModelDetailTestCaseSkeletonModelAssembler->create(
            $viewModelDetailTestCaseFileObject,
            $viewModelDetailFileObject
        );
    }

    public function setViewModelDetailTestCaseSkeletonModelAssembler(
        ViewModelDetailTestCaseSkeletonModelAssembler $viewModelDetailTestCaseSkeletonModelAssembler
    )
    {
        $this->viewModelDetailTestCaseSkeletonModelAssembler = $viewModelDetailTestCaseSkeletonModelAssembler;
    }
}
