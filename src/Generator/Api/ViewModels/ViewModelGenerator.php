<?php

namespace Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\SkeletonModels\ViewModels\Impl\ViewModelTestDetailAssemblerImpl;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelGenerator implements Generator
{
    /**
     * @var \OpenClassrooms\CodeGenerator\FileObjects\FileObjectFactory
     */
    private $fileObjectFactory;

    /**
     * @var \OpenClassrooms\CodeGenerator\Gateway\FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @param \Generator\Api\ViewModels\Request\ViewModelGeneratorRequest $request
     *
     * @return \OpenClassrooms\CodeGenerator\FileObjects\FileObject
     */
    public function generate(GeneratorRequest $request): FileObject
    {
        // domain/class
        $fileObject = new FileObject();
        $fileObject->setClassName($request->getResponseClassName());

        $skeletonModel = $this->getSkeletonModel($fileObject);
        $fileObject->setContent($this->render('Skeleton/App/Tests/ViewModelTest.php.twig', [$skeletonModel]));

        $this->fileObjectGateway->insert($fileObject);

        return $fileObject;
    }

    private function getSkeletonModel(FileObject $fileObject)
    {
        // generate ResponseStub1
        // generate TestCase
        // get Assembler Name

        $viewModel = $this->fileObjectFactory->create(FileObjectType::API_VIEW_MODEL, $fileObject->getClassName());

        $skeletonModel = (new ViewModelTestDetailAssemblerImpl())->create($viewModelAssembler);

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

}
