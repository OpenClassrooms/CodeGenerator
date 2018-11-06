<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectType;
use OpenClassrooms\CodeGenerator\Gateway\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\Tests\ViewModelTestDetailAssembler;
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
     * @var FileObjectFactory
     */
    private $fileObjectFactory;

    /**
     * @var ViewModelTestDetailAssembler
     */
    private $viewModelTestDetailAssembler;

    /**
     * @param ViewModelTestGeneratorRequest $request
     */
    public function generate(GeneratorRequest $request): FileObject
    {
        // domain/class
        $fileObject = new FileObject();
        $fileObject->setClassName($request->getResponseClassName());

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

        $viewModelAssembler = $this->fileObjectFactory->create(
            FileObjectType::API_VIEW_MODEL_ASSEMBLER_TEST,
            $fileObject->getClassName()
        );

        $skeletonModel = $this->viewModelTestDetailAssembler->create($viewModelAssembler);

        return $skeletonModel;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway)
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }

    public function setFileObjectFactory(FileObjectFactory $fileObjectFactory)
    {
        $this->fileObjectFactory = $fileObjectFactory;
    }

    public function setViewModelTestDetailAssembler(ViewModelTestDetailAssembler $viewModelTestDetailAssembler)
    {
        $this->viewModelTestDetailAssembler = $viewModelTestDetailAssembler;
    }
}
