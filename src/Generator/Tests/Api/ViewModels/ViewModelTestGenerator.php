<?php

namespace Generator\Tests\Api\ViewModels;

use FileObjects\FileObject;
use Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Generator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelTestGenerator implements Generator
{
    /**
     * @var \Gateway\FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @param \Generator\Tests\Api\ViewModels\DTO\Request\ViewModelTestGeneratorRequestDTO $request
     *
     * @return \FileObjects\FileObject
     */
    public function generate(GeneratorRequest $request): FileObject
    {
        // domain/class
        $request->getResponseClassName();
        $fileObject = new FileObject();

        $skeletonModel = $this->getSkeletonModel($fileObject);
        $fileObject->setContent($this->render('skeleteon', $skeletonModel));

        $this->fileObjectGateway->insert($fileObject);

        return $fileObject;
    }

    private function getSkeletonModel(FileObject $fileObject)
    {
        // generate ResponseStub1
        // generate TestCase
        // get Assembler Name

        $viewModelAssembler = $this->fileObjectFactory(FileObject::API_VIEW_MODEL_ASSEMBLER, $className);
        $skeletonModel->assemblerClassName = $viewModelAssembler->getClassName();

        return $skeletonModel;
    }

    public function setFileObjectGateway(\Gateway\FileObjectGateway $fileObjectGateway)
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }
}
