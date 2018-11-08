<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Gateway\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\TestsSkeleton\ViewModelTestSkeletonModelDetailAssembler;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelTestGeneratorRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelTestGenerator extends AbstractGenerator
{
    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @var UseCaseResponseFileObjectFactory
     */
    private $useCaseResponseFileObjectFactory;

    /**
     * @var ViewModelFileObjectFactory
     */
    private $viewModelFileObjectFactory;

    /**
     * @var ViewModelTestSkeletonModelDetailAssembler
     */
    private $viewModelTestDetailAssembler;

    /**
     * @param ViewModelTestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        // domain/class
        $fileObject = new FileObject();
        $fileObject->setClassName($generatorRequest->getResponseClassName());

        $skeletonModel = $this->getSkeletonModel($fileObject);

        $fileObject->setContent(
            $this->render('App/ViewModels/ViewModelTest.php.twig', ['skeletonModel' => $skeletonModel])
        );

        $fileObject->getContent();

        $this->fileObjectGateway->insert($fileObject);

        return $fileObject;
    }

    private function getSkeletonModel(FileObject $fileObject)
    {
        // generate ResponseStub1
        // generate TestCase
        // get Assembler Name

        $viewModelAssembler = $this->viewModelFileObjectFactory->create(
            ViewModelFileObjectType::API_VIEW_MODEL_ASSEMBLER_TEST,
            $fileObject->getClassName()
        );

        $skeletonModel = $this->viewModelTestDetailAssembler->create($viewModelAssembler);

        return $skeletonModel;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway)
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }

    public function setViewModelFileObjectFactory(ViewModelFileObjectFactory $viewModelFileObjectFactory)
    {
        $this->viewModelFileObjectFactory = $viewModelFileObjectFactory;
    }

    public function setViewModelTestDetailAssembler(
        ViewModelTestSkeletonModelDetailAssembler $viewModelTestDetailAssembler
    )
    {
        $this->viewModelTestDetailAssembler = $viewModelTestDetailAssembler;
    }

    public function setUseCaseResponseFileObjectFactory(
        UseCaseResponseFileObjectFactory $useCaseResponseFileObjectFactory
    )
    {
        $this->useCaseResponseFileObjectFactory = $useCaseResponseFileObjectFactory;
    }
}
